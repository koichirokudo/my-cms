<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use App\Domain\Inquiry\InquiryRepositoryInterface;
use App\Infrastructure\Inquiry\EloquentInquiryRepository;
use App\Domain\Blog\BlogRepositoryInterface;
use App\Infrastructure\Blog\EloquentBlogRepository;
use App\Domain\Resume\ResumeRepositoryInterface;
use App\Infrastructure\Resume\EloquentResumeRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InquiryRepositoryInterface::class, EloquentInquiryRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, EloquentBlogRepository::class);
        $this->app->bind(ResumeRepositoryInterface::class, EloquentResumeRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Rate limiters
        RateLimiter::for('inquiries', function ($request) {
            return [
                Limit::perMinute(5)->by($request->ip()),
            ];
        });
    }
}
