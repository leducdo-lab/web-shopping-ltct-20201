<?php

namespace Phuong\Order;

use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{

    public function register()
    {
        
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__."/routes/web.php");
        $this->loadViewsFrom(__DIR__."/views", "order");

        $this->publishes([
            __DIR__."/public/" => public_path("order"),
        ], "order_public");
    }

}