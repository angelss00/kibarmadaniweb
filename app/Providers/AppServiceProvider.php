<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Menu;
use App\Models\LoginBanner;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Pakai Bootstrap 5 untuk pagination
        Paginator::useBootstrapFive();

        // Composer untuk header menu
        View::composer('partialss.header', function ($view) {
            $menus = Menu::with(['children' => fn($q) => $q->orderBy('urutan')])
                ->whereNull('parent_id')
                ->orderBy('urutan')
                ->get();

            $view->with('menus', $menus);
        });

        // Composer untuk halaman login (banners)
        View::composer('auth.login', function ($view) {
            $banners = LoginBanner::active()->ordered()->get();
            $view->with('banners', $banners);
        });
    }
}
