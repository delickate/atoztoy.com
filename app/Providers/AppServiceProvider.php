<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; 
use App\Services\CartService;
use Illuminate\Support\Facades\View;
use App\Models\CompanyProfile;


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
        Schema::defaultStringLength(191);

        View::share('companyProfile', CompanyProfile::first());

        View::composer('*', function ($view) {

        $cartService = app(CartService::class);

        $view->with(
            'cartCount',
            $cartService->count()
        );

    });

    }
}
