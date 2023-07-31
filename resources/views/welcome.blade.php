<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')


    </head>
    <body class="antialiased">
    <form action="" name="form_uri">
        @csrf

    </form>

       <input type="hidden" name="csrf_token" id="csrf-token" value="{{ csrf_token() }}">
       <input type="hidden" name="produi_url" id="url" value="{{ route('produit.store') }}">
       <input type="hidden" name="categorie_url" id="categorie_url" value="{{ route('categorie.store') }}">
       <input type="hidden" name="categorie_all_url" id="categorie_all_url" value="{{ route('categories.all') }}">
       <input type="hidden" name="api" id="api" value="{{ route('produits.api') }}">

        <div class="root" id="root">
            @viteReactRefresh
            @vite(['resources/css/app.css', 'resources/js/app.jsx'])

        </div>
    </body>
</html>
