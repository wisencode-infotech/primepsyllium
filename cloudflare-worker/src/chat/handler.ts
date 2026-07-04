import { getExactCache, setExactCache } from '../cache/kvCache';
import { getSemanticCache, setSemanticCache } from '../cache/semanticCache';
import { loadConfig } from '../config';
import { embed } from '../embeddings/embed';
import { resolveProvider } from '../providers';
import { queryTopK } from '../retrieval/vectorize';
import type { ChatRequestBody, ChatResponseBody, Env, SourceCitation } from '../types';
import { isLikelyMedicalQuestion, MEDICAL_REDIRECT_ANSWER } from './guardrail';
import { buildUserPrompt, SYSTEM_PROMPT } from './prompt';

const ESCALATE_NO_CONTEXT_ANSWER =
    "I don't have enough information to answer that confidently — I'll have our team follow up with you directly.";

export async function handleChat(request: Request, env: Env): Promise<Response> {
    let body: ChatRequestBody;

    try {
        body = await request.json();
    } catch {
        return Response.json({ error: 'Invalid JSON body' }, { status: 400 });
    }

    if (!body.message || !body.session_id) {
        return Response.json({ error: 'session_id and message are required' }, { status: 400 });
    }

    const config = loadConfig(env);
    const history = body.history ?? [];

    // 1. Guardrail — never let a medical question reach the model at all.
    if (isLikelyMedicalQuestion(body.message)) {
        const response: ChatResponseBody = {
            answer: MEDICAL_REDIRECT_ANSWER,
            sources: [],
            suggested_follow_ups: [],
            escalate: true,
            cache_hit: 'none',
            confidence: 1,
        };

        return Response.json(response);
    }

    // 2. Exact-match cache.
    const exactHit = await getExactCache(body.message, env);
    if (exactHit) {
        return Response.json({ ...exactHit, cache_hit: 'exact' } satisfies ChatResponseBody);
    }

    const questionVector = await embed(body.message, env);

    // 3. Semantic cache.
    const semanticHit = await getSemanticCache(questionVector, config.semanticCacheThreshold, env);
    if (semanticHit) {
        return Response.json({ ...semanticHit, cache_hit: 'semantic' } satisfies ChatResponseBody);
    }

    // 4. Retrieval.
    const chunks = await queryTopK(questionVector, config.retrievalTopK, config.retrievalMinScore, env);

    if (chunks.length === 0) {
        const response: ChatResponseBody = {
            answer: ESCALATE_NO_CONTEXT_ANSWER,
            sources: [],
            suggested_follow_ups: [],
            escalate: true,
            cache_hit: 'none',
            confidence: 0,
        };

        return Response.json(response);
    }

    // 5. Build prompt + call the active provider.
    const provider = resolveProvider(env);
    const userPrompt = buildUserPrompt(body.message, chunks, history);

    let parsed: { answer: string; suggested_follow_ups: string[]; escalate: boolean };

    try {
        const raw = await provider.complete({ systemPrompt: SYSTEM_PROMPT, userPrompt });
        parsed = JSON.parse(stripJsonFences(raw));
    } catch {
        const response: ChatResponseBody = {
            answer: ESCALATE_NO_CONTEXT_ANSWER,
            sources: [],
            suggested_follow_ups: [],
            escalate: true,
            cache_hit: 'none',
            confidence: 0,
        };

        return Response.json(response);
    }

    // 6. Format the final response — sources/confidence are computed by the
    // Worker from retrieval, never trusted from the model's own output.
    const sources: SourceCitation[] = dedupeSources(
        chunks.map((chunk) => ({
            title: chunk.metadata.title,
            url: chunk.metadata.url || null,
            source_type: chunk.metadata.source_type,
        }))
    );

    const topScore = chunks[0]?.score ?? 0;

    const response: ChatResponseBody = {
        answer: parsed.answer,
        sources,
        suggested_follow_ups: parsed.suggested_follow_ups ?? [],
        escalate: Boolean(parsed.escalate),
        cache_hit: 'none',
        confidence: Math.round(topScore * 100) / 100,
    };

    // 7. Populate caches for next time (only for non-escalated, real answers).
    if (!response.escalate) {
        await setExactCache(body.message, response, env);
        await setSemanticCache(questionVector, response, env);
    }

    return Response.json(response);
}

function stripJsonFences(raw: string): string {
    return raw.trim().replace(/^```(?:json)?\s*/i, '').replace(/```\s*$/, '');
}

function dedupeSources(sources: SourceCitation[]): SourceCitation[] {
    const seen = new Set<string>();
    const result: SourceCitation[] = [];

    for (const source of sources) {
        const key = `${source.source_type}:${source.title}:${source.url}`;

        if (!seen.has(key)) {
            seen.add(key);
            result.push(source);
        }
    }

    return result;
}
