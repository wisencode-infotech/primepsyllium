<?php

namespace App\Observers;

use App\Jobs\SyncKnowledgeSourceJob;
use App\Models\Product;

class ProductObserver
{
    public function saved(Product $product): void
    {
        SyncKnowledgeSourceJob::dispatch('product', $product->id, 'upsert');
    }

    public function deleted(Product $product): void
    {
        SyncKnowledgeSourceJob::dispatch('product', $product->id, 'delete');
    }
}
