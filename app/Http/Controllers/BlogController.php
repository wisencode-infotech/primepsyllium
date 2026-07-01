<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $categories = BlogPost::query()
            ->active()
            ->published()
            ->whereNotNull('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        $activeCategory = request('category');

        $posts = BlogPost::query()
            ->active()
            ->published()
            ->when($activeCategory, fn ($q) => $q->where('category', $activeCategory))
            ->ordered()
            ->paginate(9)
            ->withQueryString();

        return view('frontend.blog.index', compact('posts', 'categories', 'activeCategory'));
    }

    public function show(BlogPost $post): View
    {
        abort_unless($post->is_active && $post->published_at && $post->published_at <= now(), 404);

        $post->load('attachments');

        $relatedPosts = BlogPost::query()
            ->active()
            ->published()
            ->where('id', '!=', $post->id)
            ->when($post->category, fn ($q) => $q->where('category', $post->category))
            ->ordered()
            ->take(3)
            ->get();

        if ($relatedPosts->count() < 3) {
            $excludeIds = $relatedPosts->pluck('id')->push($post->id);
            $extras = BlogPost::query()
                ->active()
                ->published()
                ->whereNotIn('id', $excludeIds)
                ->ordered()
                ->take(3 - $relatedPosts->count())
                ->get();
            $relatedPosts = $relatedPosts->merge($extras);
        }

        return view('frontend.blog.show', compact('post', 'relatedPosts'));
    }
}
