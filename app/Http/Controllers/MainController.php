<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class MainController extends Controller
{

    public function index(){
        return view('welcome');
    }
    public function cart(){
        return view('cart');
    }
    public function showproduct(Produit $produit){
            return view('welcome');
    }
}
