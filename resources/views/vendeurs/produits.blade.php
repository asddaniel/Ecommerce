@extends('layouts.header')
@section('content')

<div class="container-fluid">
    <div class="row pt-2 justify-content-center">
        <div class="col-lg-6 bg-white shadow">
            <form action="{{ route('vendeurs.produits.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group pt-2 pb-3 px-2">
                    <div class="text-center h3">Ajouter un produit</div>
                </div>

                <div class="form-group">
                    <label for="name">Nom du produit</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="price">Prix</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <div class="form-group">
                    <label for="description">description</label>
                    <textarea name="description" id="" class="form-control" rows="5" ></textarea>
                </div>

                <div class="form-group pt-2 pb-2 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>

        </div>
    </div>

    <div class="row p-2 ">

<table class="table table-bordered table-hover table-striped rounded shadow-sm">
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prix</th>
      <th>Image</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
      <tr >
        <td>{{ $product->name??"" }}</td>
        <td>{{ $product->price??"" }}</td>
        <td><img src="{{ $product->image??'' }}" alt="{{ $product->name??'' }}" class="img-fluid"></td>
        <td>
          <a href="g" class="btn btn-primary btn-sm">Voir</a>
          <a href="" class="btn btn-warning btn-sm">Modifier</a>
          <form action="" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

    </div>
</div>

@endsection