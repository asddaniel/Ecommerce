<div class="col-12">
    <header class="row">
        <!-- Top Nav -->
        <div class="col-12 bg-dark py-2 d-md-block d-none">
            <div class="row">
                <div class="col-auto mr-auto">
                    <ul class="top-nav text-white d-flex align-items-center">
                        <li class="px-2">
                            <a href="tel:+123-456-7890" class="nav-link text-white"><i class="fa fa-phone-square mr-2 "></i>+123-456-7890</a>
                        </li>
                        <li class="px-2">
                            <a href="mailto:mail@ecom.com" class="nav-link text-white"><i class="fa fa-envelope mr-2"></i>mail@ecom.com</a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <ul class="top-nav d-flex align-items-center">
                        <li class="px-2">
                            <a href="register.html" class="nav-link text-white"><i class="fas fa-user-edit mr-2"></i>Register</a>
                        </li>
                        <li>
                            <a href="login.html" class="nav-link text-white"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Top Nav -->

        <!-- Header -->
        <div class="col-12 bg-white pt-4">
            <div class="row">
                <div class="col-lg-auto">
                    <div class="site-logo text-center text-lg-left">
                        <a href="index.html">E-Commerce</a>
                    </div>
                </div>
                <div class="col-lg-5 mx-auto mt-4 mt-lg-0">
                    <form action="#">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="search" class="form-control border-dark" placeholder="Search..." required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-auto text-center text-lg-left header-item-holder">
                    <a href="#" class="header-item">
                        <i class="fas fa-heart mr-2"></i><span id="header-favorite">0</span>
                    </a>
                    <a href="{{ route('cart') }}" class="header-item">
                        <i class="fas fa-shopping-bag mr-2"></i><span id="header-qty" class="mr-3">2</span>
                        <i class="fas fa-money-bill-wave mr-2"></i><span id="header-price">$4,000</span>
                    </a>
                </div>
            </div>

            <!-- Nav -->
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light bg-white col-12">
                    <button class="navbar-toggler d-lg-none border-0" type="button" data-toggle="collapse" data-target="#mainNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="mainNav">
                        <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="iphone">Iphone</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="samsung">Samsung</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="oppo">Oppo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" id="nokia">Nokia</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- Nav -->

        </div>
        <!-- Header -->

    </header>
</div>