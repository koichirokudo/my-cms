<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Inquiry\InquiryRepositoryInterface;
use App\Infrastructure\Inquiry\EloquentInquiryRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InquiryRepositoryInterface::class, EloquentInquiryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
