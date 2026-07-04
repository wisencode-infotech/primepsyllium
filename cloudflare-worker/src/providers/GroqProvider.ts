import type { Env } from '../types';
import type { CompletionParams, LLMProvider } from './LLMProvider';

/**
 * Not wired up yet — kept here so switching to Groq later is additive.
 * Groq exposes an OpenAI-compatible endpoint:
 *   POST https://api.groq.com/openai/v1/chat/completions
 *   Authorization: Bearer ${env.GROQ_API_KEY}
 *   body: { model, messages: [{role:'system',content},{role:'user',content}], max_tokens, temperature }
 * The response's `choices[0].message.content` is the completion text.
 * To activate: set GATEWAY env var LLM_PROVIDER="groq", set secret GROQ_API_KEY,
 * and implement the fetch() call below following the shape documented above.
 */
export class GroqProvider implements LLMProvider {
    constructor(private readonly env: Env) {}

    async complete(_params: CompletionParams): Promise<string> {
        throw new Error('GroqProvider not yet implemented — see comment header for the wiring needed.');
    }
}
