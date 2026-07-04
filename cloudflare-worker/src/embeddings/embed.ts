import type { Env } from '../types';

export async function embed(text: string, env: Env): Promise<number[]> {
    const result = await env.AI.run(env.EMBEDDING_MODEL, { text: [text] });
    const vectors = (result as { data?: number[][] }).data;

    if (!vectors || !vectors[0]) {
        throw new Error('embed(): unexpected response shape from env.AI.run for embedding model');
    }

    return vectors[0];
}

export async function embedBatch(texts: string[], env: Env): Promise<number[][]> {
    if (texts.length === 0) {
        return [];
    }

    const result = await env.AI.run(env.EMBEDDING_MODEL, { text: texts });
    const vectors = (result as { data?: number[][] }).data;

    if (!vectors || vectors.length !== texts.length) {
        throw new Error('embedBatch(): unexpected response shape from env.AI.run for embedding model');
    }

    return vectors;
}
