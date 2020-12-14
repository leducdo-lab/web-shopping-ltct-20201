<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

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
        //
        $types = DB::table('product')->select('product_type.name','product_type.id', DB::raw('COUNT(product.id) as count'))
                ->join('product_type', 'product_type.id', '=', 'product.product_type_id')
                ->groupBy('product_type.id','product_type.name')
                ->get();
        View::share('types', $types);
    }
}
