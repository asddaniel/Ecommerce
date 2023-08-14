<?php

namespace App\Http\Controllers;

use App\Models\Livraison;
use App\Models\Livreur;
use App\Http\Requests\StoreLivraisonRequest;
use App\Http\Requests\UpdateLivraisonRequest;
use Illuminate\Support\Facades\Auth;

class LivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view("livreurs.index", ["livreur"=>Livreur::where("user_id", Auth::user()->id)->first()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLivraisonRequest $request)
    {


    }

    /**
     * Display the specified resource.
     */
    public function show(Livraison $livraison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livraison $livraison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLivraisonRequest $request, Livraison $livraison)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livraison $livraison)
    {
        //
    }
}
