@extends('layouts.header')
@section('content')

<div class="container-fluid">
    @if ($livreur)
    <div class="row pt-2 justify-content-center">
        <div class="col-lg-6 px-3">

            <form  class="bg-white shadow px-3 rounded"
             action="{{ route('livreur.update', $livreur->id) }}" method="post" enctype="multipart/form-data">
             @method("PUT")
                @csrf
                <div class="form-group pt-2 pb-3 px-2">
                    <div class="text-center h3">modifiez vos information de livraison</div>
                </div>

                <div class="form-group ">
                    <label for="name">prix par kilo</label>
                    <input type="number" class="form-control" id="name" name="prix_par_kilo" value="{{ $livreur->prix_par_kilo }}" required>
                </div>


                <div class="form-group ">
                    <label for="name">prix par valeur</label>
                    <input type="number" class="form-control" id="name" name="prix_par_valeur"  value="{{ $livreur->prix_par_valeur }}" required>
                </div>

                <div class="form-group ">
                    <label for="name">prix par distance</label>
                    <input type="number" class="form-control" id="name" name="prix_par_distance"  value="{{ $livreur->prix_par_distance}}" required>
                </div>

                <div class="form-group ">
                    <label for="name">delais de livraison</label>
                    <input type="number" class="form-control" id="name" value="{{ $livreur->delais }}" name="delais" required>
                </div>

                <div class="form-group pt-2 pb-2 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary">mettre a jour</button>
                </div>
            </form>

        </div>
        <div class="col-lg-6 px-4">


        </div>
    </div>
    @else
    <div class="row pt-2 justify-content-center">
        <div class="col-lg-6 px-3">
            {{ $livreur }}
            <form  class="bg-white shadow px-3 rounded"
             action="{{ route('livreur.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group pt-2 pb-3 px-2">
                    <div class="text-center h3">devenez livreur</div>
                </div>

                <div class="form-group ">
                    <label for="name">prix par kilo</label>
                    <input type="number" class="form-control" id="name" name="prix_par_kilo" required>
                </div>


                <div class="form-group ">
                    <label for="name">prix par valeur</label>
                    <input type="number" class="form-control" id="name" name="prix_par_valeur" required>
                </div>

                <div class="form-group ">
                    <label for="name">prix par distance</label>
                    <input type="number" class="form-control" id="name" name="prix_par_distance" required>
                </div>

                <div class="form-group ">
                    <label for="name">delais de livraison</label>
                    <input type="number" class="form-control" id="name" name="delais">
                </div>

                <div class="form-group pt-2 pb-2 d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>

        </div>
        <div class="col-lg-6 px-4">


        </div>
    </div>
    @endif



</div>

@endsection