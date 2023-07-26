<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Support\Facades\Auth;

class VendeurController extends Controller
{

    public function produits(){
        return view('vendeurs.produits', [
            'products'=> Produit::where('user_id', Auth::user()->id)->get(),
            'categories'=> Categorie::all()
        ]);
    }

    public function dashboard(){
        return view('vendeurs.dashboard');
    }
}
