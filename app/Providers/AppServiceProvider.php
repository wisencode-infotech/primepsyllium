<?php

namespace App\Providers;

use App\Models\BlogPost;
use App\Models\Certification;
use App\Models\Product;
use App\Models\Setting;
use App\Observers\BlogPostObserver;
use App\Observers\CertificationObserver;
use App\Observers\ProductObserver;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('backend.partials.topbar', function ($view) {
            $user = auth()->user();

            $view->with([
                'unreadNotificationsCount' => $user?->unreadNotifications()->count() ?? 0,
                'recentNotifications' => $user?->notifications()->latest()->take(8)->get() ?? collect(),
            ]);
        });

        View::composer('emails.*', function ($view) {
            $view->with('branding', Setting::current());
        });

        RateLimiter::for('chat', fn ($request) => Limit::perMinute(10)->by($request->ip()));
        RateLimiter::for('contact', fn ($request) => Limit::perMinute(5)->by($request->ip()));

        Product::observe(ProductObserver::class);
        BlogPost::observe(BlogPostObserver::class);
        Certification::observe(CertificationObserver::class);
    }
}
