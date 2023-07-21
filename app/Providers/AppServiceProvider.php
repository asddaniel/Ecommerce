<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Produit;
use App\Models\Ligne_vente;
use App\Models\Vente;
use Illuminate\Support\Facades\Route;

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
        Schema::defaultStringLength(200);

        Route::bind('Produit', function($value){
            return Produit::findOrFail($value);
        });
        Route::bind('Vente', function($value){
            return Vente::findOrFail($value);
        });
        Route::bind('Ligne_vente', function($value){
            return Ligne_vente::findOrFail($value);
        });
    }
}
