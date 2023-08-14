<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Produit;
use App\Models\Ligne_vente;
use App\Models\Vente;
use App\Models\Commentaire;
use App\Models\Livreur;
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

        Route::bind('produit', function($value){
            return Produit::with('commentaires')->findOrFail($value);
        });
        Route::bind('Produit', function($value){
            return Produit::with('commentaires.user')->findOrFail($value);
        });
        Route::bind('Vente', function($value){
            return Vente::findOrFail($value);
        });
        Route::bind('Ligne_vente', function($value){
            return Ligne_vente::findOrFail($value);
        });

        Route::bind('Commentaire', function($value){
            return Commentaire::findOrFail($value);
        });
        Route::bind('Livreur', function($value){
            return Livreur::findOrFail($value);
        });
    }
}
