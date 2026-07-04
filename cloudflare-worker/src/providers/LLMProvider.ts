export interface CompletionParams {
    systemPrompt: string;
    userPrompt: string;
    maxTokens?: number;
    temperature?: number;
}

/**
 * Every model backend implements this one interface. Swapping the active
 * LLM later means adding an adapter here and flipping env.LLM_PROVIDER —
 * nothing outside this folder (Laravel, the widget) ever needs to change.
 */
export interface LLMProvider {
    complete(params: CompletionParams): Promise<string>;
}
