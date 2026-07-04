import type { ChunkMetadata, Env, RetrievedChunk, SourceType } from '../types';

/**
 * Vectorize has no "delete by metadata filter" — only delete-by-id. To keep
 * re-ingestion idempotent (upsert = delete old chunks for this source, then
 * insert the new ones) we use deterministic ids ("{source_id}::{index}") and
 * unconditionally attempt to delete a fixed range of them before inserting.
 * Deleting a non-existent id is a no-op, so this is safe even for sources
 * that previously had fewer (or zero) chunks. A single source is capped at
 * this many chunks — plenty for a product/blog page or a moderate document.
 */
const MAX_CHUNKS_PER_SOURCE = 64;

function chunkId(sourceId: string, index: number): string {
    return `${sourceId}::${index}`;
}

export async function deleteBySourceId(sourceId: string, env: Env): Promise<void> {
    const ids = Array.from({ length: MAX_CHUNKS_PER_SOURCE }, (_, i) => chunkId(sourceId, i));
    await env.VECTORIZE_KB.deleteByIds(ids);
}

export async function upsertChunks(
    sourceType: SourceType,
    sourceId: string,
    title: string,
    url: string | null,
    chunkTexts: string[],
    chunkVectors: number[][],
    env: Env
): Promise<void> {
    if (chunkTexts.length > MAX_CHUNKS_PER_SOURCE) {
        chunkTexts = chunkTexts.slice(0, MAX_CHUNKS_PER_SOURCE);
        chunkVectors = chunkVectors.slice(0, MAX_CHUNKS_PER_SOURCE);
    }

    const vectors = chunkTexts.map((text, index) => ({
        id: chunkId(sourceId, index),
        values: chunkVectors[index],
        metadata: {
            source_type: sourceType,
            source_id: sourceId,
            title,
            url: url ?? '',
            chunk_index: index,
            text,
        } satisfies ChunkMetadata,
    }));

    if (vectors.length > 0) {
        await env.VECTORIZE_KB.upsert(vectors);
    }
}

export async function queryTopK(
    queryVector: number[],
    topK: number,
    minScore: number,
    env: Env
): Promise<RetrievedChunk[]> {
    const result = await env.VECTORIZE_KB.query(queryVector, { topK, returnMetadata: 'all' });

    return result.matches
        .filter((match) => match.score >= minScore)
        .map((match) => {
            const metadata = match.metadata as unknown as ChunkMetadata;

            return {
                text: metadata.text,
                score: match.score,
                metadata,
            };
        });
}
