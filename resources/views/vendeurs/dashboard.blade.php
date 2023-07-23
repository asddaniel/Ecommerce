@extends('layouts.header')

@section('content')

<div class="container-fluid pt-3 pb-3">
    <div class="row pb-3">
        <div class="col-lg-3">
            <div class="px-2 p-2">
                <a href=  "{{ route('home') }}" class="card border-none shadow-sm nav-link px-0 pt-0">
                    <div class="card-header">
                        <div class="fw-bold h2">Produits</div>
                    </div>
                    <div class="card-body">
                        <div class="fw-light text-start">
                            2555
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="px-2 p-2">
                <a href=  "{{ route('home') }}" class="card border-none shadow-sm nav-link px-0 pt-0">
                    <div class="card-header">
                        <div class="fw-bold h2">Ventes</div>
                    </div>
                    <div class="card-body">
                        <div class="fw-light text-start">
                            2555
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="px-2 p-2">
                <a href=  "{{ route('vendeurs.produits') }}" class="card border-none shadow-sm nav-link px-0 pt-0">
                    <div class="card-header">
                        <div class="fw-bold h2">Clients</div>
                    </div>
                    <div class="card-body">
                        <div class="fw-light text-start">
                            2555
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection