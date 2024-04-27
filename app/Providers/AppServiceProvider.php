<?php

namespace App\Providers;

use App\Contracts\LeaveServiceInterface;
use App\Services\LeaveService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LeaveServiceInterface::class, LeaveService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
        $verticalMenuData = json_decode($verticalMenuJson);
        View::share('menuData', [$verticalMenuData]);
    }
}
