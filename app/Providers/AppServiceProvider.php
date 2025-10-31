<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Inquiry\InquiryRepositoryInterface;
use App\Infrastructure\Inquiry\EloquentInquiryRepository;
use App\Domain\Blog\BlogRepositoryInterface;
use App\Infrastructure\Blog\EloquentBlogRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InquiryRepositoryInterface::class, EloquentInquiryRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, EloquentBlogRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
