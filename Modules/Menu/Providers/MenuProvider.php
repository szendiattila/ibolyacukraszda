<?php

namespace Modules\Menu\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Menu\Entities\Menu;

class MenuProvider extends ServiceProvider
{


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('frontend::layouts.partials._navbar', function($view){

            $menus = Menu::orderBy('order')->get();

            dd($menus);

            $view->with('menus', $menus);
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

}
