<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Compartilha com todas as views
        //view()->share('categories', \App\Models\Category::all(['name', 'slug']) );

        //compartilha com a view informada e todas as que estendem dela
        /* view()->composer('layouts.site', function($view){
            $view->with('categories', \App\Models\Category::all(['name', 'slug']));
        }); */


        //o callback agora é o método compose da classe CategoriesViewComposer
        view()->composer('layouts.site', 'App\Http\Views\Composer\CategoriesViewComposer@compose');
    }
}
