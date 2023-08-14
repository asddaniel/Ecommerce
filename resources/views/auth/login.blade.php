<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Commerce </title>

    <link href="//fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/index.css')}}">
</head>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row min-vh-100 ">


            <div class="col-12 pt-3">
                <!-- Main Content -->


                <main class="row  pt-5">
                    <div class="col-lg-4 col-md-6 col-sm-8 mx-auto bg-white py-3 mb-4    shadow rounded">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center">Se Connecter</h2>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" id="remember" class="form-check-input">
                                            <label for="remember" class="form-check-label ml-2">Se souvenir de moi</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">

                                            <a href="{{ route('register') }}" class="form-check-label ml-2">vous n'avez pas de compte ?</a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-dark">Se connecter</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </main>
                <!-- Main Content -->
            </div>



    </div>

    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</body>
</html>