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
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

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
