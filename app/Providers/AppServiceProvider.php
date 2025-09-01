<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        View::composer('partialss.header', function ($view) {
            $menus = Menu::with(['children' => fn($q) => $q->orderBy('urutan')])
                ->whereNull('parent_id')
                ->orderBy('urutan')
                ->get();

            $view->with('menus', $menus);
        });
    }
}
