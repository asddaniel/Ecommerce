@extends('layouts.header')

@section('content')

<div class="container-fluid">
    <div class="row px-2">
        <div class="col-lg-6 px-3 pt-3">
            <form  class="bg-white shadow px-3 rounded "
             action="{{ route('vendeurs.produits.update', $produit->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
             @csrf
                <div class="form-group pt-2 pb-3 px-2">
                    <div class="text-center h3">modifier un produit </div>
                </div>

                <div class="form-group">
                    <label for="name">Nom du produit</label>
                    <input type="text" class="form-control" id="name" value="{{ $produit->name }}" name="name">
                </div>

                <div class="form-group">
                    <label for="price">Prix</label>
                    <input type="text" class="form-control" id="price" value="{{ $produit->price }}" name="price">
                </div>
                <div class="form-group">
                    <label for="categorie">Categorie</label>
                    <select name="categorie_id" id="categorie" class="form-control">
                        <option >Choisir une categorie</option>
                        @foreach ($categories as $categorie)

                            <option value="{{ $categorie->id }}" {{ ($produit->categorie->id??"")===$categorie->id?"selected":"" }}>  {{ $categorie->name }}</option>

                        @endforeach


                    </select>
                </div>
                <div class="form-group d-flex justify-content-start p-2 border rounded">
                    <label for="enchere">vente aux enchere ?</label>
                    <input type="checkbox" class="form-control" name="enchere" {{ $produit->enchere?"checked":''}}>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div class="form-group">
                    <label for="description">description</label>
                    <textarea name="description" id="" class="form-control" rows="5" >{{ $produit->description }}</textarea>
                </div>

                <div class="form-group pt-2 pb-2 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary">enregistrer</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection