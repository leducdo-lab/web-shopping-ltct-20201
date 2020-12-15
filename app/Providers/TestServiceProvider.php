<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\TestProvider\HelloRepository;
use App\Library\HelloClass;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(HelloRepository::class, HelloClass::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
