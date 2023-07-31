@extends('layouts.header')
@section('content')

<div class="container-fluid pb-5 pt-5 px-3">
    <div class="row justify-content-center ">
        <div class="container">
            <form action="{{ route('categorie.update', $categorie->id) }}" method="post" class="col-lg-6 bg-white rounded shadow-sm pt-2 pb-2">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="name">Nom de la categorie</label>
                    <input type="text" class="form-control" value="{{ $categorie->name }}" name="name" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary">Enregistrer</button>
                </div>

            </form>

        </div>

    </div>
</div>

@endsection