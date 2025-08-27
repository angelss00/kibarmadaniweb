<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu;
use Illuminate\Support\Facades\View;

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
    public function boot()
    {
        View::composer('partialss.header', function ($view) {
            $menus = Menu::with(['children' => fn($q) => $q->orderBy('urutan')])
                ->whereNull('parent_id')
                ->orderBy('urutan')
                ->get();

            $view->with('menus', $menus);
        });
    }
}
