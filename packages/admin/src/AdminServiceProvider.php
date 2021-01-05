<?php

namespace HongThao\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider 
{

    public function register()
    {
        
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__."/routes/web.php");
        $this->loadViewsFrom(__DIR__."/views", "admins");

        $this->publishes([
            __DIR__."/public/" => public_path("admins")
        ],"public_admins");
    }


}