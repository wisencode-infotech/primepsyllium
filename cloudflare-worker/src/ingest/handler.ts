import { loadConfig } from '../config';
import { embedBatch } from '../embeddings/embed';
import { chunkText } from '../chunking/chunk';
import { deleteBySourceId, upsertChunks } from '../retrieval/vectorize';
import type { Env, IngestPayload } from '../types';

export async function handleIngest(request: Request, env: Env): Promise<Response> {
    let payload: IngestPayload;

    try {
        payload = await request.json();
    } catch {
        return Response.json({ error: 'Invalid JSON body' }, { status: 400 });
    }

    if (!payload.source_type || !payload.source_id || !payload.action) {
        return Response.json({ error: 'source_type, source_id, and action are required' }, { status: 400 });
    }

    // Idempotent: always clear this source's previous chunks before (re)inserting.
    await deleteBySourceId(payload.source_id, env);

    if (payload.action === 'delete') {
        return Response.json({ ok: true, source_id: payload.source_id, chunks: 0 });
    }

    if (!payload.text || !payload.title) {
        return Response.json({ error: 'title and text are required for an upsert action' }, { status: 400 });
    }

    const config = loadConfig(env);
    const chunks = chunkText(payload.text, config.chunkSizeTokens, config.chunkOverlapTokens);

    if (chunks.length === 0) {
        return Response.json({ ok: true, source_id: payload.source_id, chunks: 0 });
    }

    const vectors = await embedBatch(chunks, env);

    await upsertChunks(
        payload.source_type,
        payload.source_id,
        payload.title,
        payload.url ?? null,
        chunks,
        vectors,
        env
    );

    return Response.json({ ok: true, source_id: payload.source_id, chunks: chunks.length });
}
