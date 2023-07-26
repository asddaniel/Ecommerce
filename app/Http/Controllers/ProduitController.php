<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreProduitRequest $request)
    {

        $data = $request->validated();
        if($request->hasFile('image')){

            $data['image'] = str_replace('images', '', $request->image->store('images'));


        }
        $data['user_id'] = Auth::user()->id;
        Produit::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        return view('produits.show', [
            'produit' => $produit
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        return view('produits.edit', [
            'produit' => $produit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProduitRequest $request, Produit $produit)
    {
        $data = $request->validated();
        if($request->hasFile('image')){
            $data['image'] = str_replace('images', '', $request->image->store('images'));

        }
        $produit->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        if(Auth::user()->id == $produit->user_id){
        $filePath = storage_path('app/images/' . $produit->image);

  // Vérifier que le fichier existe
            if(file_exists($filePath)) {

                // Supprimer le fichier
                unlink($filePath);

            }
        $produit->delete();
        }
        return redirect()->back();
    }
}
