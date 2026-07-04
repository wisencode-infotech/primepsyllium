import type { Env } from '../types';

const EPOCH_KEY = 'cache:epoch';

export async function getEpoch(env: Env): Promise<number> {
    const value = await env.CACHE_KV.get(EPOCH_KEY);

    return value ? parseInt(value, 10) : 0;
}

export async function bumpEpoch(env: Env): Promise<number> {
    const next = (await getEpoch(env)) + 1;
    await env.CACHE_KV.put(EPOCH_KEY, String(next));

    return next;
}
