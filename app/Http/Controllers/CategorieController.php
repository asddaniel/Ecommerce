<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Http\Resources\CategorieResource;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CategorieResource::collection(Categorie::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create', ["categories"=>Categorie::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategorieRequest $request)
    {
        
        $categorie = Categorie::create($request->validated());
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        return new CategorieResource($categorie);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        return view("categories.edit", compact("categorie"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategorieRequest $request, Categorie $categorie)
    {
        $categorie->update($request->validated());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();
        return response(['message' => 'Categorie supprimée'], 202);
    }
}
