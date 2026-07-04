import type { Env } from '../types';
import type { CompletionParams, LLMProvider } from './LLMProvider';

export class WorkersAIProvider implements LLMProvider {
    constructor(
        private readonly env: Env,
        private readonly model: string
    ) {}

    async complete(params: CompletionParams): Promise<string> {
        const result = await this.env.AI.run(this.model, {
            messages: [
                { role: 'system', content: params.systemPrompt },
                { role: 'user', content: params.userPrompt },
            ],
            max_tokens: params.maxTokens ?? 700,
            temperature: params.temperature ?? 0.3,
        });

        const response = (result as { response?: unknown }).response;

        if (typeof response === 'string') {
            return response;
        }

        if (response && typeof response === 'object') {
            return JSON.stringify(response);
        }

        const choiceContent = (result as { choices?: { message?: { content?: string } }[] }).choices?.[0]?.message
            ?.content;

        if (typeof choiceContent === 'string') {
            return choiceContent;
        }

        throw new Error('WorkersAIProvider: unexpected response shape from env.AI.run');
    }
}
