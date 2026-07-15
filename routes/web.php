<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AccreditationController;
use App\Http\Controllers\Admin\BlogPostController as AdminBlogPostController;
use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\ChatbotSettingController;
use App\Http\Controllers\Admin\CompanyVideoController;
use App\Http\Controllers\Admin\ContactInquiryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EmailBrandSettingController;
use App\Http\Controllers\Admin\EmailRecipientController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\GalleryItemController;
use App\Http\Controllers\Admin\MediaCenterItemController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ChatLogController;
use App\Http\Controllers\Admin\KnowledgeDocumentController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ThemeSettingController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController as FrontendCountryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\BlogPost;
use App\Models\Country;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Run via: /run-storage-link?token=prime2024secure
Route::get('/run-storage-link', function () {
    $secret = 'prime2024secure';
    if (request('token') !== $secret) {
        abort(403, 'Unauthorized');
    }
    Artisan::call('storage:link');
    return '<pre>storage:link done. Public storage symlink created successfully.</pre>';
});

// Run via: /run-migrate?token=prime2024secure
Route::get('/run-migrate', function () {
    $secret = 'prime2024secure';
    if (request('token') !== $secret) {
        abort(403, 'Unauthorized');
    }
    Artisan::call('migrate', ['--force' => true]);
    return '<pre>'.e(Artisan::output()).'</pre>';
});

// Run via: /run-gallery-thumbnails?token=prime2024secure
// Add &force=1 to regenerate thumbnails that already exist.
Route::get('/run-gallery-thumbnails', function () {
    $secret = 'prime2024secure';
    if (request('token') !== $secret) {
        abort(403, 'Unauthorized');
    }
    Artisan::call('gallery:generate-thumbnails', request()->boolean('force') ? ['--force' => true] : []);
    return '<pre>'.e(Artisan::output()).'</pre>';
});

// Run via: /run-clear-cache?token=prime2024secure
// Clears cached config/route/view files. Fixes symptoms where Storage:: calls
// (or routes/views) act like the app is still at an old path/version after a
// server migration or restore, even though files on disk are current.
Route::get('/run-clear-cache', function () {
    $secret = 'prime2024secure';
    if (request('token') !== $secret) {
        abort(403, 'Unauthorized');
    }
    $output = '';
    foreach (['config:clear', 'route:clear', 'view:clear', 'cache:clear'] as $command) {
        Artisan::call($command);
        $output .= "\$ php artisan {$command}\n".Artisan::output()."\n";
    }
    return '<pre>'.e($output).'</pre>';
});

// Run via: /run-gallery-diagnose?token=prime2024secure
// One-shot check for why gallery files show as "missing" to Laravel's storage
// disk even though some render on the live page — usually a broken/missing
// public/storage symlink (real folder instead of a link, or pointing elsewhere).
Route::get('/run-gallery-diagnose', function () {
    $secret = 'prime2024secure';
    if (request('token') !== $secret) {
        abort(403, 'Unauthorized');
    }

    $publicStorage = public_path('storage');
    $storageAppPublic = storage_path('app/public');

    $lines = [];
    $lines[] = 'public_path(storage): '.$publicStorage;
    $lines[] = 'is symlink: '.(is_link($publicStorage) ? 'YES -> '.readlink($publicStorage) : 'NO — not a symlink, this is almost certainly the problem');
    $lines[] = 'is directory: '.(is_dir($publicStorage) ? 'yes' : 'NO — path does not exist at all');
    $lines[] = '';
    $lines[] = 'storage/app/public/gallery file count: '.count(glob($storageAppPublic.'/gallery/*') ?: []);
    $lines[] = 'public/storage/gallery file count: '.count(glob($publicStorage.'/gallery/*') ?: []);
    $lines[] = '';
    $lines[] = 'config cache file exists: '.(is_file(base_path('bootstrap/cache/config.php')) ? 'YES — config is cached, this can hold a stale absolute path' : 'no');
    $lines[] = "config('filesystems.disks.public.root'): ".config('filesystems.disks.public.root');
    $lines[] = 'freshly computed storage_path(app/public): '.$storageAppPublic;
    $lines[] = 'Storage::disk(public)->exists() for sample: '.(\Illuminate\Support\Facades\Storage::disk('public')->exists($samplePathForCheck = \App\Models\GalleryItem::query()->whereNotNull('image')->latest('id')->value('image')) ? 'YES' : 'no').' ('.$samplePathForCheck.')';
    $lines[] = '';

    $lines[] = 'PHP process user: '.(function_exists('posix_geteuid') ? (posix_getpwuid(posix_geteuid())['name'] ?? posix_geteuid()) : get_current_user().' (posix_* unavailable, from get_current_user())');
    $lines[] = 'GD extension loaded: '.(extension_loaded('gd') ? 'yes' : 'NO');
    $lines[] = 'Imagick extension loaded: '.(extension_loaded('imagick') ? 'yes' : 'NO');
    $lines[] = '';

    $samples = \App\Models\GalleryItem::query()->whereNotNull('image')->latest('id')->limit(3)->pluck('image');
    foreach ($samples as $path) {
        $full = $storageAppPublic.'/'.$path;
        $lines[] = "DB image path: {$path}";
        $lines[] = '  exists in storage/app/public: '.(is_file($full) ? 'YES' : 'no');
        $lines[] = '  exists in public/storage:     '.(is_file($publicStorage.'/'.$path) ? 'YES' : 'no');
        if (is_file($full)) {
            $lines[] = '  is_readable: '.(is_readable($full) ? 'yes' : 'NO — permission denied for the PHP process user');
            $perms = substr(sprintf('%o', fileperms($full)), -4);
            $owner = function_exists('posix_getpwuid') ? (posix_getpwuid(fileowner($full))['name'] ?? fileowner($full)) : fileowner($full);
            $group = function_exists('posix_getgrgid') ? (posix_getgrgid(filegroup($full))['name'] ?? filegroup($full)) : filegroup($full);
            $lines[] = "  permissions: {$perms}, owner: {$owner}, group: {$group}";
        }

        // bypass Laravel's `throw => false` swallow to surface the *real* Flysystem/GD exception
        try {
            $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
            $manager->read($full);
            $lines[] = '  Intervention read: OK';
        } catch (\Throwable $e) {
            $lines[] = '  Intervention read FAILED: '.get_class($e).': '.$e->getMessage();
        }
    }

    $lines[] = '';
    $lines[] = '--- write test ---';
    $thumbDir = $storageAppPublic.'/gallery/thumbs';
    $lines[] = 'gallery/thumbs directory exists: '.(is_dir($thumbDir) ? 'yes' : 'no (will attempt to create it now)');
    if (! is_dir($thumbDir)) {
        $created = @mkdir($thumbDir, 0755, true);
        $lines[] = 'mkdir result: '.($created ? 'OK' : 'FAILED — '.(error_get_last()['message'] ?? 'unknown error'));
    }
    $testFile = $thumbDir.'/_write_test.txt';
    $written = @file_put_contents($testFile, 'ok');
    $lines[] = 'test file write: '.($written !== false ? 'OK' : 'FAILED — '.(error_get_last()['message'] ?? 'unknown error'));
    if ($written !== false) {
        @unlink($testFile);
    }

    $lines[] = '';
    $lines[] = '--- full generate()+save() attempt, bypassing the log-only error swallow ---';
    if ($samplePathForCheck) {
        try {
            $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
            $image = $manager->read($storageAppPublic.'/'.$samplePathForCheck);
            $image->scaleDown(width: 900);
            $thumbPath = \App\Services\GalleryThumbnailer::thumbPath($samplePathForCheck);
            $fullThumbPath = $storageAppPublic.'/'.$thumbPath;
            @mkdir(dirname($fullThumbPath), 0755, true);
            $image->save($fullThumbPath, quality: 75);
            $lines[] = "saved to: {$thumbPath}";
            $lines[] = 'file exists after save: '.(is_file($fullThumbPath) ? 'YES — it worked' : 'NO — save() ran without throwing but no file appeared');
        } catch (\Throwable $e) {
            $lines[] = 'FAILED: '.get_class($e).': '.$e->getMessage();
        }
    }

    return '<pre>'.e(implode("\n", $lines)).'</pre>';
});

Route::get('/', HomeController::class)->name('home');

Route::get('/about-us', AboutController::class)->name('about.index');

Route::get('/accreditation', AccreditationController::class)->name('accreditation.index');

Route::get('/applications', ApplicationsController::class)->name('applications.index');

Route::get('/gallery', GalleryController::class)->name('gallery.index');
Route::get('/gallery/items', [GalleryController::class, 'items'])->name('gallery.items');

Route::get('/psyllium', [ProductController::class, 'index'])->name('products.index');

Route::get('/products', IngredientsController::class)->name('ingredients.index');

Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/events', [EventController::class, 'index'])->name('events.index');

Route::get('/events/{event:slug}', [EventController::class, 'show'])->name('events.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:contact')->name('contact.store');

Route::post('/api/chat', [ChatController::class, 'send'])->middleware('throttle:chat')->name('chat.send');

Route::middleware(['auth', 'verified', 'role:super-admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function (): void {
        Route::get('/', AdminDashboardController::class)->name('dashboard');

        Route::post('products/reorder', [AdminProductController::class, 'reorder'])->name('products.reorder');
        Route::resource('products', AdminProductController::class)->except('show');

        Route::post('certifications/reorder', [CertificationController::class, 'reorder'])->name('certifications.reorder');
        Route::resource('certifications', CertificationController::class)->except('show');

        Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

        Route::get('company-video', [CompanyVideoController::class, 'edit'])->name('company-video.edit');
        Route::put('company-video', [CompanyVideoController::class, 'update'])->name('company-video.update');

        Route::get('theme', [ThemeSettingController::class, 'edit'])->name('theme.edit');
        Route::put('theme', [ThemeSettingController::class, 'update'])->name('theme.update');
        Route::delete('theme', [ThemeSettingController::class, 'restore'])->name('theme.restore');

        Route::get('email-branding', [EmailBrandSettingController::class, 'edit'])->name('email-branding.edit');
        Route::put('email-branding', [EmailBrandSettingController::class, 'update'])->name('email-branding.update');
        Route::delete('email-branding', [EmailBrandSettingController::class, 'restore'])->name('email-branding.restore');

        Route::post('media-center-items/reorder', [MediaCenterItemController::class, 'reorder'])->name('media-center-items.reorder');
        Route::post('media-center-items/upload-image', [MediaCenterItemController::class, 'uploadImage'])->name('media-center-items.upload-image');
        Route::resource('media-center-items', MediaCenterItemController::class)->except('show');

        Route::post('gallery/reorder', [GalleryItemController::class, 'reorder'])->name('gallery.reorder');
        Route::resource('gallery', GalleryItemController::class)->except('show');

        Route::post('gallery-categories/reorder', [GalleryCategoryController::class, 'reorder'])->name('gallery-categories.reorder');
        Route::delete('gallery-categories/default', [GalleryCategoryController::class, 'clearDefault'])->name('gallery-categories.clear-default');
        Route::post('gallery-categories/{gallery_category}/default', [GalleryCategoryController::class, 'setDefault'])->name('gallery-categories.set-default');
        Route::resource('gallery-categories', GalleryCategoryController::class)->except('show');

        Route::post('countries/reorder', [CountryController::class, 'reorder'])->name('countries.reorder');
        Route::resource('countries', CountryController::class)->except('show');

        Route::resource('email-templates', EmailTemplateController::class)->except('show');
        Route::resource('email-recipients', EmailRecipientController::class)->except('show');
        Route::resource('inquiries', ContactInquiryController::class)->only(['index', 'show', 'destroy']);
        Route::post('inquiries/{inquiry}/reply', [ContactInquiryController::class, 'reply'])->name('inquiries.reply');

        Route::resource('knowledge-documents', KnowledgeDocumentController::class)->only(['index', 'create', 'store', 'destroy']);

        Route::delete('chat-logs/clear-all', [ChatLogController::class, 'clearAll'])->name('chat-logs.clear-all');
        Route::resource('chat-logs', ChatLogController::class)->only(['index', 'show', 'destroy']);

        Route::get('ai-chatbot-settings', [ChatbotSettingController::class, 'edit'])->name('ai-chatbot-settings.edit');
        Route::put('ai-chatbot-settings', [ChatbotSettingController::class, 'update'])->name('ai-chatbot-settings.update');

        Route::resource('blog', AdminBlogPostController::class)->except('show');
        Route::post('blog/upload-image', [AdminBlogPostController::class, 'uploadImage'])->name('blog.upload-image');
        Route::delete('blog-attachments/{attachment}', [AdminBlogPostController::class, 'destroyAttachment'])->name('blog.attachments.destroy');

        Route::post('notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
        Route::post('notifications/{notification}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
    });

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';

// Root-level slug catch-all — resolves to a Country detail page (/usa, /canada, ...)
// first, falling back to a Blog post (matches old site URL patterns for SEO).
// Must be last so it doesn't shadow any named routes above.
Route::get('/{slug}', function (string $slug) {
    $country = Country::query()->where('slug', $slug)->active()->withPage()->first();

    if ($country) {
        return app(FrontendCountryController::class)->show($country);
    }

    $post = BlogPost::query()->where('slug', $slug)->firstOrFail();

    return app(BlogController::class)->show($post);
})->name('page.show');
