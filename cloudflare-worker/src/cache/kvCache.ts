import type { ChatResponseBody, Env } from '../types';
import { normalizeMessage, sha256Hex } from '../utils/hash';
import { getEpoch } from './epoch';

async function keyFor(message: string, env: Env): Promise<string> {
    const epoch = await getEpoch(env);
    const raw = `${epoch}:${env.LLM_PROVIDER}:${env.CHAT_MODEL}:${normalizeMessage(message)}`;

    return `chat:${await sha256Hex(raw)}`;
}

export async function getExactCache(message: string, env: Env): Promise<ChatResponseBody | null> {
    const key = await keyFor(message, env);
    const raw = await env.CACHE_KV.get(key);

    return raw ? (JSON.parse(raw) as ChatResponseBody) : null;
}

export async function setExactCache(message: string, response: ChatResponseBody, env: Env): Promise<void> {
    const key = await keyFor(message, env);
    const ttl = parseInt(env.CACHE_TTL_SECONDS, 10);

    await env.CACHE_KV.put(key, JSON.stringify(response), { expirationTtl: ttl });
}
