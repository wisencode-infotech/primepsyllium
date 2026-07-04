export interface Env {
    AI: Ai;
    VECTORIZE_KB: VectorizeIndex;
    VECTORIZE_CACHE: VectorizeIndex;
    CACHE_KV: KVNamespace;

    LLM_PROVIDER: string;
    EMBEDDING_MODEL: string;
    EMBEDDING_DIMENSIONS: string;
    CHAT_MODEL: string;
    CACHE_TTL_SECONDS: string;
    SEMANTIC_CACHE_THRESHOLD: string;
    RETRIEVAL_TOP_K: string;
    RETRIEVAL_MIN_SCORE: string;
    CHUNK_SIZE_TOKENS: string;
    CHUNK_OVERLAP_TOKENS: string;

    GATEWAY_SHARED_SECRET: string;
    GROQ_API_KEY?: string;
    GEMINI_API_KEY?: string;
}

export type SourceType = 'product' | 'blog_post' | 'certification' | 'company_profile' | 'about_page' | 'document';

export interface IngestPayload {
    source_type: SourceType;
    source_id: string;
    action: 'upsert' | 'delete';
    title?: string;
    url?: string | null;
    text?: string;
    updated_at?: string;
}

export interface ChatHistoryTurn {
    role: 'user' | 'assistant';
    content: string;
}

export interface ChatRequestBody {
    session_id: string;
    message: string;
    history?: ChatHistoryTurn[];
}

export interface SourceCitation {
    title: string;
    url: string | null;
    source_type: SourceType;
}

export type CacheHit = 'none' | 'exact' | 'semantic';

export interface ChatResponseBody {
    answer: string;
    sources: SourceCitation[];
    suggested_follow_ups: string[];
    escalate: boolean;
    cache_hit: CacheHit;
    confidence: number;
}

export interface ChunkMetadata {
    source_type: SourceType;
    source_id: string;
    title: string;
    /** Empty string means "no URL" — Vectorize metadata does not allow null values. */
    url: string;
    chunk_index: number;
    text: string;
    [key: string]: string | number | boolean;
}

export interface RetrievedChunk {
    text: string;
    score: number;
    metadata: ChunkMetadata;
}
