<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LigneVenteController;
use App\Http\Controllers\VendeurController;
use App\Http\Controllers\ProduitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/cart', [MainController::class, 'cart'])->name('cart');
Route::get("/produits/{Produit}", [ProduitController::class, 'show'])->name('produits.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('vendeurs')->group(function () {
          Route::get('', [VendeurController::class, 'dashboard'])->name('vendeurs');
          Route::get('/produits', [VendeurController::class, 'produits'])->name('vendeurs.produits');
          Route::post('/produits', [ProduitController::class, 'store'])->name('vendeurs.produits.store');
          Route::middleware(['proprio'])->group(function () {
            Route::get('/produits/{Produit}/edit', [ProduitController::class, 'edit'])->name('vendeurs.produits.edit');
            Route::put('/produits/{Produit}', [ProduitController::class, 'update'])->name('vendeurs.produits.update');
            Route::get('/produits/{Produit}/delete', [ProduitController::class, 'destroy'])->name('vendeurs.produits.destroy');

          });

        });
});



require __DIR__.'/auth.php';
