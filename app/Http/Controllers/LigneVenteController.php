<?php

namespace App\Http\Controllers;

use App\Models\Ligne_vente;
use App\Http\Requests\StoreLigne_venteRequest;
use App\Http\Requests\UpdateLigne_venteRequest;

class LigneVenteController extends Controller
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
    public function store(StoreLigne_venteRequest $request)
    {
        $ligne = Ligne_vente::create($request->validated());
        return response()->json($ligne);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ligne_vente $ligne_vente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ligne_vente $ligne_vente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLigne_venteRequest $request, Ligne_vente $ligne_vente)
    {
        $ligne_vente->update($request->validated());
        return response()->json($ligne_vente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ligne_vente $ligne_vente)
    {
        $ligne_vente->delete();
        return response()->json([
            'message' => 'Ligne de vente supprimée',
        ]);
    }
}
