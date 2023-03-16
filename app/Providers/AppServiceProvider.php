<?php

namespace App\Providers;

use App\Http\View\Composers\MenuComposer;
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
        // Register the MenuComposer for the layouts.app view
        View::composer('layouts.app', MenuComposer::class);
    }
}
