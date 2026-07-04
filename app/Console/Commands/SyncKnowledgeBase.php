<?php

namespace App\Console\Commands;

use App\Models\BlogPost;
use App\Models\Certification;
use App\Models\Product;
use App\Services\ChatGatewayClient;
use App\Services\KnowledgeBase\KnowledgeSourceBuilder;
use Illuminate\Console\Command;

class SyncKnowledgeBase extends Command
{
    protected $signature = 'kb:sync';

    protected $description = 'Full re-sync of Products, Blog posts, Certifications, and the company profile into the chatbot knowledge base';

    public function handle(ChatGatewayClient $gateway, KnowledgeSourceBuilder $builder): int
    {
        $this->syncProducts($gateway, $builder);
        $this->syncBlogPosts($gateway, $builder);
        $this->syncCertifications($gateway, $builder);

        $gateway->ingest($builder->forCompanyProfile());
        $this->info('Synced company profile.');

        $gateway->ingest($builder->forAboutPage());
        $this->info('Synced About Us page content.');

        $gateway->purgeCache();
        $this->info('Purged chat response cache.');

        return self::SUCCESS;
    }

    private function syncProducts(ChatGatewayClient $gateway, KnowledgeSourceBuilder $builder): void
    {
        [$upserted, $deleted] = [0, 0];

        Product::query()->each(function (Product $product) use ($gateway, $builder, &$upserted, &$deleted) {
            if ($product->is_active) {
                $gateway->ingest($builder->forProduct($product));
                $upserted++;
            } else {
                $gateway->ingest($builder->deleteFor('product', $product->id));
                $deleted++;
            }
        });

        $this->info("Products: {$upserted} synced, {$deleted} removed.");
    }

    private function syncBlogPosts(ChatGatewayClient $gateway, KnowledgeSourceBuilder $builder): void
    {
        [$upserted, $deleted] = [0, 0];

        BlogPost::query()->each(function (BlogPost $blogPost) use ($gateway, $builder, &$upserted, &$deleted) {
            $isPublished = $blogPost->is_active && $blogPost->published_at && $blogPost->published_at->isPast();

            if ($isPublished) {
                $gateway->ingest($builder->forBlogPost($blogPost));
                $upserted++;
            } else {
                $gateway->ingest($builder->deleteFor('blog_post', $blogPost->id));
                $deleted++;
            }
        });

        $this->info("Blog posts: {$upserted} synced, {$deleted} removed.");
    }

    private function syncCertifications(ChatGatewayClient $gateway, KnowledgeSourceBuilder $builder): void
    {
        [$upserted, $deleted] = [0, 0];

        Certification::query()->each(function (Certification $certification) use ($gateway, $builder, &$upserted, &$deleted) {
            if ($certification->is_active) {
                $gateway->ingest($builder->forCertification($certification));
                $upserted++;
            } else {
                $gateway->ingest($builder->deleteFor('certification', $certification->id));
                $deleted++;
            }
        });

        $this->info("Certifications: {$upserted} synced, {$deleted} removed.");
    }
}
