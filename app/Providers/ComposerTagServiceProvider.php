<?php

namespace App\Providers;

use App\View\TagComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerTagServiceProvider extends ServiceProvider
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

//        1 method
//        $tags = Tag::orderBy('name')->get();
//        View::share('tags', $tags);

//        2 method
//        View::composer(['welcome.*','welcome.welcome1'], function ($view) use ($tags) {
//            $view->with('tags', $tags);
//        });

//        method3

        View::composer(['partials.*','partials.list'], TagComposer::class);
        //
    }
}
