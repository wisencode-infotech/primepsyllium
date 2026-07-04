# Prime Psyllium AI Gateway (Cloudflare Worker)

This is the "AI Gateway" behind the site's chat widget: it embeds visitor
questions, retrieves relevant chunks from the knowledge base, calls the
active LLM, formats the answer, and caches results. Laravel is the only
caller — this Worker is never contacted directly by a browser.

## One-time Cloudflare setup

1. Create/log into a Cloudflare account. Enable **Workers & Pages**.
2. Enable **Workers AI** and **Vectorize** on the account (Dashboard → those
   product pages → enable/accept terms). Check current free-tier limits in
   Cloudflare's docs before relying on them for production traffic.
3. Install dependencies:
   ```
   cd cloudflare-worker
   npm install
   ```
4. Authenticate the CLI:
   ```
   npx wrangler login
   ```
5. Create the two Vectorize indexes. **Verify the current output dimension
   of `@cf/baai/bge-base-en-v1.5`** in the Workers AI model catalog before
   running this — Cloudflare occasionally changes model ids/dimensions:
   ```
   npx wrangler vectorize create primepsyllium-kb --dimensions=768 --metric=cosine
   npx wrangler vectorize create primepsyllium-chat-cache --dimensions=768 --metric=cosine
   ```
6. Create the KV namespace used for exact-match caching + the cache epoch
   counter:
   ```
   npx wrangler kv namespace create CACHE_KV
   npx wrangler kv namespace create CACHE_KV --preview
   ```
   Paste the two returned ids into `wrangler.toml` under `[[kv_namespaces]]`
   (`id` and `preview_id`).
7. Generate a long random secret and store it as a Worker secret — this is
   what authenticates Laravel's requests to this Worker (`X-Gateway-Secret`
   header):
   ```
   openssl rand -hex 32
   npx wrangler secret put GATEWAY_SHARED_SECRET
   ```
   Save the same value into the Laravel app's `.env` as `CHAT_GATEWAY_SECRET`.
8. Deploy:
   ```
   npx wrangler deploy
   ```
   Note the printed `*.workers.dev` URL (or configure a custom route in the
   dashboard) and save it into Laravel's `.env` as `CHAT_GATEWAY_URL`.

## Local development

Plain `wrangler dev` cannot emulate the `AI` or `Vectorize` bindings offline.
Use `--remote`, which proxies bindings to the real resources created above
while still hot-reloading local TypeScript changes:
```
npm run dev
```
This prints a local URL (default `http://127.0.0.1:8787`) — point Laravel's
local `.env` `CHAT_GATEWAY_URL` at it while developing, then switch to the
real deployed URL for production.

## Switching the AI model/provider later

Everything routes through `src/providers/index.ts::resolveProvider()`, which
picks an adapter based on the `LLM_PROVIDER` env var (`workers-ai` today).
`GroqProvider` and `GeminiProvider` are stubbed out with the exact API shape
documented in their file headers — implementing one and flipping
`LLM_PROVIDER` in `wrangler.toml` is the entire migration. No other file,
and nothing in Laravel or the widget, needs to change.

## Endpoints

All routes except `/health` require the `X-Gateway-Secret` header.

- `GET /health` — liveness check, no auth.
- `POST /chat` — `{ session_id, message, history? }` → see `src/types.ts`
  (`ChatResponseBody`) for the response shape.
- `POST /ingest` — `{ source_type, source_id, action, title?, url?, text?, updated_at? }`.
  Used both by Laravel's DB-content sync and its document-upload pipeline.
- `POST /cache/purge` — bumps the cache epoch, effectively invalidating all
  previously cached answers without a bulk delete. Laravel calls this after
  every knowledge-base sync.

## Known limitations (acceptable for current scale, revisit if traffic grows)

- Each knowledge source is capped at 64 chunks (`MAX_CHUNKS_PER_SOURCE` in
  `src/retrieval/vectorize.ts`) — Vectorize only supports delete-by-id, so
  idempotent re-ingestion deletes a fixed id range rather than tracking a
  chunk count elsewhere. Fine for product/blog pages and moderate documents;
  a very large uploaded document could be truncated.
- The semantic cache index (`primepsyllium-chat-cache`) only grows — old
  entries become invisible once the cache epoch bumps (via metadata
  filtering) but are never physically deleted. Revisit if the index grows
  large enough to matter; Vectorize has no cheap bulk-delete-by-filter today.
