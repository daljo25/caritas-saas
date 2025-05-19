<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::setUpdateRoute(function ($handle) {
            $route = Route::post('/livewire/update', $handle)->middleware('web');

            // Solo agregar el middleware de tenant si NO estamos en el dominio central
            if (!in_array(request()->getHost(), Config::get('tenancy.central_domains', []))) {
                $route->middleware(InitializeTenancyByDomain::class);
            }

            return $route;
        });
        Model::unguard();
    }
}
