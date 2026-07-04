import type { Env } from './types';

export function loadConfig(env: Env) {
    return {
        llmProvider: env.LLM_PROVIDER || 'workers-ai',
        embeddingModel: env.EMBEDDING_MODEL,
        embeddingDimensions: parseInt(env.EMBEDDING_DIMENSIONS, 10),
        chatModel: env.CHAT_MODEL,
        cacheTtlSeconds: parseInt(env.CACHE_TTL_SECONDS, 10),
        semanticCacheThreshold: parseFloat(env.SEMANTIC_CACHE_THRESHOLD),
        retrievalTopK: parseInt(env.RETRIEVAL_TOP_K, 10),
        retrievalMinScore: parseFloat(env.RETRIEVAL_MIN_SCORE),
        chunkSizeTokens: parseInt(env.CHUNK_SIZE_TOKENS, 10),
        chunkOverlapTokens: parseInt(env.CHUNK_OVERLAP_TOKENS, 10),
    };
}

export type Config = ReturnType<typeof loadConfig>;
