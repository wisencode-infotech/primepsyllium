import { bumpEpoch } from './cache/epoch';
import { handleChat } from './chat/handler';
import { handleIngest } from './ingest/handler';
import { isAuthorized } from './middleware/auth';
import type { Env } from './types';

export default {
    async fetch(request: Request, env: Env): Promise<Response> {
        const url = new URL(request.url);

        if (request.method === 'GET' && url.pathname === '/health') {
            return Response.json({ ok: true });
        }

        if (!isAuthorized(request, env)) {
            return Response.json({ error: 'Unauthorized' }, { status: 401 });
        }

        if (request.method === 'POST' && url.pathname === '/chat') {
            return handleChat(request, env);
        }

        if (request.method === 'POST' && url.pathname === '/ingest') {
            return handleIngest(request, env);
        }

        if (request.method === 'POST' && url.pathname === '/cache/purge') {
            const epoch = await bumpEpoch(env);

            return Response.json({ ok: true, epoch });
        }

        return Response.json({ error: 'Not found' }, { status: 404 });
    },
};
