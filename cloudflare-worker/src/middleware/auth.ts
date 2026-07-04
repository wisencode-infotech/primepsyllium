import type { Env } from '../types';

export function isAuthorized(request: Request, env: Env): boolean {
    const provided = request.headers.get('X-Gateway-Secret');

    if (!provided || !env.GATEWAY_SHARED_SECRET) {
        return false;
    }

    return timingSafeEqual(provided, env.GATEWAY_SHARED_SECRET);
}

function timingSafeEqual(a: string, b: string): boolean {
    if (a.length !== b.length) {
        return false;
    }

    let mismatch = 0;
    for (let i = 0; i < a.length; i++) {
        mismatch |= a.charCodeAt(i) ^ b.charCodeAt(i);
    }

    return mismatch === 0;
}
