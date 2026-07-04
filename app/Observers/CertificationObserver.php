<?php

namespace App\Observers;

use App\Jobs\SyncKnowledgeSourceJob;
use App\Models\Certification;

class CertificationObserver
{
    public function saved(Certification $certification): void
    {
        $action = $certification->is_active ? 'upsert' : 'delete';

        SyncKnowledgeSourceJob::dispatch('certification', $certification->id, $action);
    }

    public function deleted(Certification $certification): void
    {
        SyncKnowledgeSourceJob::dispatch('certification', $certification->id, 'delete');
    }
}
