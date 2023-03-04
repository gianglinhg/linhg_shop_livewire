<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $blogCategories = DB::table('blog_categories')->latest()->get();
        $himCategories = DB::table('product_categories')->where('sex','men')->get();
        $herCategories = DB::table('product_categories')->where('sex','women')->get();
        View::share([
            'blogCategories' => $blogCategories,
            'himCategories' => $himCategories,
            'herCategories' => $herCategories
        ]);
    }
}
