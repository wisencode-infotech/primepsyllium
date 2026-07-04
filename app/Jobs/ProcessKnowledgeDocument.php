<?php

namespace App\Jobs;

use App\Models\KnowledgeDocument;
use App\Services\ChatGatewayClient;
use App\Services\DocumentTextExtractor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProcessKnowledgeDocument implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(private readonly int $documentId) {}

    public function handle(ChatGatewayClient $gateway, DocumentTextExtractor $extractor): void
    {
        $document = KnowledgeDocument::find($this->documentId);

        if (! $document) {
            return;
        }

        $document->update(['status' => 'processing', 'error_message' => null]);

        try {
            $absolutePath = Storage::disk($document->disk)->path($document->path);
            $text = $extractor->extract($absolutePath, $document->mime_type);

            if ($text === '') {
                throw new \RuntimeException('No extractable text found in this document.');
            }

            $gateway->ingest([
                'source_type' => 'document',
                'source_id' => "document:{$document->id}",
                'action' => 'upsert',
                'title' => $document->title ?: $document->original_filename,
                'url' => null,
                'text' => $text,
                'updated_at' => now()->toIso8601String(),
            ]);

            $document->update(['status' => 'synced', 'synced_at' => now()]);
        } catch (\Throwable $e) {
            $document->update(['status' => 'failed', 'error_message' => $e->getMessage()]);
        }
    }
}
