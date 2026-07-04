import type { Env } from '../types';
import { GeminiProvider } from './GeminiProvider';
import { GroqProvider } from './GroqProvider';
import type { LLMProvider } from './LLMProvider';
import { WorkersAIProvider } from './WorkersAIProvider';

/**
 * The only place that decides which LLM answers questions. Switching models
 * later is a one-line change to env.LLM_PROVIDER (wrangler.toml [vars]) plus
 * whichever provider-specific secret it needs — no other file changes.
 */
export function resolveProvider(env: Env): LLMProvider {
    switch (env.LLM_PROVIDER) {
        case 'groq':
            return new GroqProvider(env);
        case 'gemini':
            return new GeminiProvider(env);
        case 'workers-ai':
        default:
            return new WorkersAIProvider(env, env.CHAT_MODEL);
    }
}
