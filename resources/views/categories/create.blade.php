@extends('layouts.header')
@section('content')

    <div class="container-fluid">
        <div class="row pt-3 pb-5 px-3">
            <div class="col-lg-5">
                <div class="row px-2 bg-white border rounded pt-2 pb-3">
                        <form action="{{ route('categorie.store') }}" method="post">
                            @csrf
                            <div class="form-group p-2">
                                <label for="name">Nom de la categorie</label>
                                <input type="text" class="form-control" required id="name" name="name">
                            </div>
                            <div class="form-group p-2">
                                <button class="btn btn-secondary">Enregistrer</button>
                            </div>

                        </form>
                </div>
            </div>
            <div class="col-lg-7 px-2">
                <div class="container-fluid px-3">
                    <div class="row p-2 bg-white shadow">

                        <table class="table table-bordered table-hover table-striped rounded shadow-sm">
                        <thead>
                            <tr>
                            <th>Nom</th>

                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $categorie)
                            <tr >
                                <td>{{ substr($categorie->name??"", 0, 15) }}</td>

                                <td class="d-flex justify-content-between">

                                <a href="{{ route('categorie.edit', $categorie->id) }}" class="btn btn-secondary btn-sm">Modifier</a>

                                 <form action="{{ route('categorie.destroy', $categorie->id) }}" method="post">
                                    <button class="btn btn-danger">Supprimer</button>
                                </form>


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection