@extends('layouts.header')

@section('content')

<div class="container-fluid">
    <div class="row px-2">
        <div class="col-lg-6 px-3">
            <form  class="bg-white shadow px-3"
             action="{{ route('vendeurs.produits.update', $produit->id) }}" method="post" enctype="multipart/form-data">
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