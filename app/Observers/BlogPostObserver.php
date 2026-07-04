<?php

namespace App\Observers;

use App\Jobs\SyncKnowledgeSourceJob;
use App\Models\BlogPost;

class BlogPostObserver
{
    public function saved(BlogPost $blogPost): void
    {
        $action = $blogPost->is_active && $blogPost->published_at && $blogPost->published_at->isPast()
            ? 'upsert'
            : 'delete';

        SyncKnowledgeSourceJob::dispatch('blog_post', $blogPost->id, $action);
    }

    public function deleted(BlogPost $blogPost): void
    {
        SyncKnowledgeSourceJob::dispatch('blog_post', $blogPost->id, 'delete');
    }
}
