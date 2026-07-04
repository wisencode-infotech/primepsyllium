/**
 * Splits plain text into overlapping chunks sized in approximate tokens.
 * Token count is approximated as word count (close enough for chunk sizing —
 * this only needs to keep chunks within the embedding model's context window,
 * not be billing-accurate).
 */
export function chunkText(text: string, sizeTokens: number, overlapTokens: number): string[] {
    const normalized = text.replace(/\r\n/g, '\n').trim();

    if (!normalized) {
        return [];
    }

    const paragraphs = normalized.split(/\n{2,}/).map((p) => p.trim()).filter(Boolean);
    const words: string[] = [];

    for (const paragraph of paragraphs) {
        words.push(...paragraph.split(/\s+/), '\n\n');
    }

    if (words.length === 0) {
        return [];
    }

    const chunks: string[] = [];
    let start = 0;

    while (start < words.length) {
        const end = Math.min(start + sizeTokens, words.length);
        const chunk = words.slice(start, end).join(' ').replace(/\s*\n\n\s*/g, '\n\n').trim();

        if (chunk) {
            chunks.push(chunk);
        }

        if (end >= words.length) {
            break;
        }

        start = end - overlapTokens;
    }

    return chunks;
}
