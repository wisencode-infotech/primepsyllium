<?php

use App\Http\Controllers\Admin\CertificationController;
use App\Http\Controllers\Admin\ContactInquiryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EmailRecipientController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\MediaCenterItemController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ThemeSettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/events/{event:slug}', [EventController::class, 'show'])->name('events.show');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'verified', 'role:super-admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function (): void {
        Route::get('/', AdminDashboardController::class)->name('dashboard');

        Route::post('products/reorder', [ProductController::class, 'reorder'])->name('products.reorder');
        Route::resource('products', ProductController::class)->except('show');

        Route::post('certifications/reorder', [CertificationController::class, 'reorder'])->name('certifications.reorder');
        Route::resource('certifications', CertificationController::class)->except('show');

        Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

        Route::get('theme', [ThemeSettingController::class, 'edit'])->name('theme.edit');
        Route::put('theme', [ThemeSettingController::class, 'update'])->name('theme.update');
        Route::delete('theme', [ThemeSettingController::class, 'restore'])->name('theme.restore');

        Route::post('media-center-items/reorder', [MediaCenterItemController::class, 'reorder'])->name('media-center-items.reorder');
        Route::resource('media-center-items', MediaCenterItemController::class)->except('show');

        Route::post('countries/reorder', [CountryController::class, 'reorder'])->name('countries.reorder');
        Route::resource('countries', CountryController::class)->except('show');

        Route::resource('email-templates', EmailTemplateController::class)->except('show');
        Route::resource('email-recipients', EmailRecipientController::class)->except('show');
        Route::resource('inquiries', ContactInquiryController::class)->only(['index', 'show', 'destroy']);
    });

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';
