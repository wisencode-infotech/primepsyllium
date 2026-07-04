/**
 * Cheap pre-filter so obviously medical/dosage questions never reach the LLM
 * at all — belt-and-braces alongside the system prompt instruction, since a
 * keyword check can't be talked out of its answer the way a model can.
 */
const MEDICAL_KEYWORDS = [
    'dosage', 'dose', 'mg', 'milligram', 'overdose', 'cure', 'cures', 'treat', 'treats', 'treatment',
    'diagnos', 'pregnan', 'breastfeed', 'laxative', 'side effect', 'interact with medication',
    'drug interaction', 'contraindicat', 'medical advice', 'symptom', 'disease', 'medication',
    'prescription', 'allerg', 'safe for', 'is it safe to', 'how much should i take',
];

export function isLikelyMedicalQuestion(message: string): boolean {
    const normalized = message.toLowerCase();

    return MEDICAL_KEYWORDS.some((keyword) => normalized.includes(keyword));
}

export const MEDICAL_REDIRECT_ANSWER =
    "I'm not able to give medical or dosage guidance — please consult a healthcare professional. " +
    "I can connect you with our team for anything else about our products or company.";
