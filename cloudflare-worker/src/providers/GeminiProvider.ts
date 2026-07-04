import type { Env } from '../types';
import type { CompletionParams, LLMProvider } from './LLMProvider';

/**
 * Not wired up yet — kept here so switching to Gemini later is additive.
 * Gemini's REST endpoint:
 *   POST https://generativelanguage.googleapis.com/v1beta/models/${model}:generateContent?key=${env.GEMINI_API_KEY}
 *   body: { systemInstruction: {parts:[{text: systemPrompt}]}, contents: [{role:'user', parts:[{text: userPrompt}]}] }
 * The response's `candidates[0].content.parts[0].text` is the completion text.
 * To activate: set GATEWAY env var LLM_PROVIDER="gemini", set secret GEMINI_API_KEY,
 * and implement the fetch() call below following the shape documented above.
 */
export class GeminiProvider implements LLMProvider {
    constructor(private readonly env: Env) {}

    async complete(_params: CompletionParams): Promise<string> {
        throw new Error('GeminiProvider not yet implemented — see comment header for the wiring needed.');
    }
}
