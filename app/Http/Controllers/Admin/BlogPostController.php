<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogPostRequest;
use App\Models\BlogPost;
use App\Models\BlogPostAttachment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BlogPostController extends Controller
{
    public function index(): View
    {
        $blogPosts = BlogPost::query()->orderByDesc('created_at')->get();

        return view('backend.blog.index', compact('blogPosts'));
    }

    public function create(): View
    {
        return view('backend.blog.create');
    }

    public function store(BlogPostRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['slug'] = $this->uniqueSlug($data['title']);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        $post = BlogPost::query()->create($data);

        $this->saveAttachments($request, $post);

        return redirect()->route('admin.blog.index')->with('status', 'Blog post created successfully.');
    }

    public function edit(BlogPost $blog): View
    {
        $blog->load('attachments');

        return view('backend.blog.edit', ['blogPost' => $blog]);
    }

    public function update(BlogPostRequest $request, BlogPost $blog): RedirectResponse
    {
        $data = $request->validated();
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('featured_image')) {
            if ($blog->featured_image) {
                Storage::disk('public')->delete($blog->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('blog', 'public');
        }

        $blog->update($data);

        $this->saveAttachments($request, $blog);

        return redirect()->route('admin.blog.index')->with('status', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $blog): RedirectResponse
    {
        if ($blog->featured_image) {
            Storage::disk('public')->delete($blog->featured_image);
        }

        foreach ($blog->attachments as $attachment) {
            Storage::disk('public')->delete($attachment->path);
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')->with('status', 'Blog post deleted successfully.');
    }

    public function uploadImage(Request $request): JsonResponse
    {
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp,gif', 'max:4096'],
        ]);

        $path = $request->file('image')->store('blog/content', 'public');

        /** @var \Illuminate\Filesystem\FilesystemAdapter $disk */
        $disk = Storage::disk('public');

        return response()->json(['url' => $disk->url($path)]);
    }

    public function destroyAttachment(BlogPostAttachment $attachment): JsonResponse
    {
        Storage::disk('public')->delete($attachment->path);
        $attachment->delete();

        return response()->json(['status' => 'ok']);
    }

    private function saveAttachments(Request $request, BlogPost $post): void
    {
        if (! $request->hasFile('attachments')) {
            return;
        }

        foreach ($request->file('attachments') as $file) {
            $path = $file->store('blog/attachments', 'public');

            $post->attachments()->create([
                'original_name' => $file->getClientOriginalName(),
                'path' => $path,
                'mime_type' => $file->getMimeType(),
                'size' => $file->getSize(),
            ]);
        }
    }

    private function uniqueSlug(string $title): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $suffix = 2;

        while (BlogPost::query()->where('slug', $slug)->exists()) {
            $slug = $original.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }
}
