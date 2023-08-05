<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\LigneVenteController;
use App\Http\Controllers\VendeurController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Models\Produit;
use App\Http\Resources\ProduitResource;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\VenteController;


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
Route::get('/payement', [MainController::class, 'index'])->name('paiement');
Route::get('/cart', [MainController::class, 'index'])->name('cart');
Route::get("/produits/{Produit}", [ProduitController::class, 'show'])->name('produits.show');
Route::get("/produit/{Produit}", [MainController::class, 'showproduct'])->name('produits.view');
Route::get("/api/produits", [ProduitController::class, 'api'])->name('produits.api');
Route::get("/api/produits/{Produit}", function(Produit $produit){
     return response()->json($produit);
})->name('produits.apires');

Route::get("/produits/{Produit}/discussion", [MainController::class, 'index'])->name('produits.discussion');

Route::get("/livreurs", [MainController::class, "index"])->name("livreurs");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get("/productlist", [MainController::class, "index"])->name("livreurs");
    Route::post("/produits", [ProduitController::class, "store"])->name("produit.store");
    Route::get("/ventes/create", [VenteController::class, "store"])->name("ventes.store");
    Route::post("/ventes/ligne", [LigneVenteController::class, "store"])->name("lignesventes.store");
    Route::post("/ventes/ligne/destroy/{Ligne_vente}", [LigneVenteController::class, "destroy"])->name("lignesventes.destroy");
    Route::post("/ventes/ligne/update/{Ligne_vente}", [LigneVenteController::class, "update"])->name("lignesventes.update");
    Route::resource('categorie', CategorieController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/categories/all', [CategorieController::class, 'index'])->name('categories.all');
    Route::post('/commentaires', [CommentaireController::class, 'store'])->name('commentaires.store')->withoutMiddleware(['csrf']);
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
