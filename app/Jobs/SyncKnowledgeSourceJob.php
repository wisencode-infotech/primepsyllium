<?php

namespace App\Jobs;

use App\Models\BlogPost;
use App\Models\Certification;
use App\Models\Product;
use App\Services\ChatGatewayClient;
use App\Services\KnowledgeBase\KnowledgeSourceBuilder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SyncKnowledgeSourceJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        private readonly string $sourceType,
        private readonly int $modelId,
        private readonly string $action
    ) {}

    public function handle(ChatGatewayClient $gateway, KnowledgeSourceBuilder $builder): void
    {
        try {
            if ($this->action === 'delete') {
                $gateway->ingest($builder->deleteFor($this->sourceType, $this->modelId));

                return;
            }

            $model = match ($this->sourceType) {
                'product' => Product::find($this->modelId),
                'blog_post' => BlogPost::find($this->modelId),
                'certification' => Certification::find($this->modelId),
                default => null,
            };

            if ($model === null) {
                // Model was deleted before this job ran — clear it from the index instead.
                $gateway->ingest($builder->deleteFor($this->sourceType, $this->modelId));

                return;
            }

            $payload = match ($this->sourceType) {
                'product' => $builder->forProduct($model),
                'blog_post' => $builder->forBlogPost($model),
                'certification' => $builder->forCertification($model),
            };

            $gateway->ingest($payload);
        } catch (\Throwable $e) {
            Log::error("Knowledge base sync failed for {$this->sourceType}:{$this->modelId}: ".$e->getMessage());
        }
    }
}
