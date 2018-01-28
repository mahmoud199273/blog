<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
     public function boot()
    {
        //
        $query = \DB::table('category')->where('status', '=', '1')
                                      ->select('categoryId','categoryTitle')
                                      ->orderBy('categoryId', 'DESC')
                                      ->get()->toArray();
       View::share( 'categories', $query );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
