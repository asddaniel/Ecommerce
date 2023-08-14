<?php

namespace App\Http\Controllers;

use App\Models\Livreur;
use App\Http\Requests\StoreLivreurRequest;
use App\Http\Requests\UpdateLivreurRequest;
use Illuminate\Support\Facades\Auth;

class LivreurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  response()->json(Livreur::with("user")->get());
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
    public function store(StoreLivreurRequest $request)
    {
        $data = $request->validated();
        $data["user_id"] = Auth::user()->id;
        Livreur::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Livreur $livreur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livreur $livreur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLivreurRequest $request, Livreur $livreur)
    {
        $livreur->update($request->validated());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livreur $livreur)
    {
        //
    }
}
