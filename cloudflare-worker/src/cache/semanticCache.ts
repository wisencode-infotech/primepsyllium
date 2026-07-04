import type { ChatResponseBody, Env } from '../types';
import { getEpoch } from './epoch';

interface SemanticCacheMetadata {
    epoch: number;
    response: string;
    created_at: string;
    [key: string]: string | number | boolean | null;
}

export async function getSemanticCache(
    questionVector: number[],
    threshold: number,
    env: Env
): Promise<ChatResponseBody | null> {
    const epoch = await getEpoch(env);

    const result = await env.VECTORIZE_CACHE.query(questionVector, {
        topK: 1,
        filter: { epoch },
        returnMetadata: 'all',
    });

    const match = result.matches[0];

    if (!match || match.score < threshold) {
        return null;
    }

    const metadata = match.metadata as unknown as SemanticCacheMetadata;

    return JSON.parse(metadata.response) as ChatResponseBody;
}

export async function setSemanticCache(
    questionVector: number[],
    response: ChatResponseBody,
    env: Env
): Promise<void> {
    const epoch = await getEpoch(env);

    await env.VECTORIZE_CACHE.upsert([
        {
            id: crypto.randomUUID(),
            values: questionVector,
            metadata: {
                epoch,
                response: JSON.stringify(response),
                created_at: new Date().toISOString(),
            } satisfies SemanticCacheMetadata,
        },
    ]);
}
