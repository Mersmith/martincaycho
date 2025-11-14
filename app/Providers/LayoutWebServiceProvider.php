<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class LayoutWebServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('layouts.web.layout-web', function ($view) {
            $menus = Menu::whereNull('parent_id')
                ->where('activo', true)
                ->with('children')
                ->orderBy('orden')
                ->get();

            $view->with('menus', $menus);
        });
    }
}
