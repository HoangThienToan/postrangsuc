<?php
namespace App\Providers;

use App\Services\ApiMatBAo;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ApiMatBAo::class, function ($app) {
            return new ApiMatBAo();
        });
    }
}

