@extends('layouts.header')

@section('content')

<div class="col-12">
    <!-- Main Content -->
    <main class="row">
        <div class="col-12 bg-white py-3 my-3">
            <div class="row">

                <!-- Product Images -->
                <div class="col-lg-5 col-md-12 mb-3">
                    <div class="col-12 mb-3">
                        <div class="img-large border" style="background-image: url('{{ asset("storage/images/".$produit->image) }}')"></div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-2 col-3">
                                <div class="img-small border" style="background-image: url('{{ asset("storage/images/".$produit->image) }}')" data-src="{{ asset("storage/images/".$produit->image) }}"></div>
                            </div>
                            <div class="col-sm-2 col-3">
                                <div class="img-small border" style="background-image: url('{{ asset("storage/images/".$produit->image) }}')" data-src="{{ asset("storage/images/".$produit->image) }}"></div>
                            </div>
                            <div class="col-sm-2 col-3">
                                <div class="img-small border" style="background-image: url('{{ asset("storage/images/".$produit->image) }}')" data-src="{{ asset("storage/images/".$produit->image) }}"></div>
                            </div>
                            <div class="col-sm-2 col-3">
                                <div class="img-small border" style="background-image: url('{{ asset("storage/images/".$produit->image) }}')" data-src="{{ asset("storage/images/".$produit->image) }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product Images -->

                <!-- Product Info -->
                <div class="col-lg-5 col-md-9">
                    <div class="col-12 product-name large">
                        {{ $produit->name }}
                        <small>Par <a href="#">{{ $produit->user->name }}</a></small>
                    </div>
                    <div class="col-12 px-0">
                        <hr>
                    </div>
                    <div class="col-12">
                        <ul>
                            <li>{{ $produit->description }}</li>

                        </ul>
                    </div>
                </div>
                <!-- Product Info -->

                <!-- Sidebar -->
                <div class="col-lg-2 col-md-3 text-center">
                    <div class="col-12 border-left border-top sidebar h-100">
                        <div class="row">
                            <div class="col-12">
                            <span class="detail-price">
                               $ {{ $produit->price }}
                            </span>

                            </div>
                            <div class="col-xl-5 col-md-9 col-sm-3 col-5 mx-auto mt-3">
                                <div class="form-group">
                                    <label for="qty">Quantite</label>
                                    <input type="number" id="qty" min="1" value="{{ $produit->quantity }}" class="form-control" required disabled>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <a href="{{ route('vendeurs.produits.edit', $produit->id) }}" class="btn btn-outline-dark" type="button"><i class="fa-regular fa-pen-to-square"></i> editer</a>
                            </div>
                            <div class="col-12 mt-3">
                                <button class="btn btn-outline-secondary btn-sm" type="button"><i class="fas fa-heart mr-2"></i>23</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->

            </div>
        </div>

        <div class="col-12 mb-3 py-3 bg-white text-justify">
            <div class="row">

                <!-- Details -->
                <div class="col-md-7">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12 text-uppercase">
                                <h2><u>Details</u></h2>
                            </div>
                            <div class="col-12" id="details">
                                <h4>{{ $produit->name }}</h4>

                                <p>{{ $produit->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Details -->

                <!-- Ratings & Reviews -->
                <div class="col-md-5">
                    <div class="col-12 px-md-4 border-top border-left sidebar h-100">

                        <!-- Rating -->
                        <div class="row">
                            <div class="col-12 mt-md-0 mt-3 text-uppercase">
                                <h2><u>commentaires & notes</u></h2>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-4 text-center">
                                        <div class="row">
                                            <div class="col-12 average-rating">
                                                4.1
                                            </div>
                                            <div class="col-12">
                                             de {{ $produit->commentaires->count() }} commentaires
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <ul class="rating-list mt-3">
                                            <li>
                                                <div class="progress">
                                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                </div>
                                                <div class="rating-progress-label">
                                                    5<i class="fas fa-star ml-1"></i>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="progress">
                                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
                                                </div>
                                                <div class="rating-progress-label">
                                                    4<i class="fas fa-star ml-1"></i>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="progress">
                                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">15%</div>
                                                </div>
                                                <div class="rating-progress-label">
                                                    3<i class="fas fa-star ml-1"></i>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="progress">
                                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 7%;" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100">7%</div>
                                                </div>
                                                <div class="rating-progress-label">
                                                    2<i class="fas fa-star ml-1"></i>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="progress">
                                                    <div class="progress-bar bg-dark" role="progressbar" style="width: 3%;" aria-valuenow="3" aria-valuemin="3" aria-valuemax="100">3%</div>
                                                </div>
                                                <div class="rating-progress-label">
                                                    1<i class="fas fa-star ml-1"></i>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Rating -->

                        <div class="row">
                            <div class="col-12 px-md-3 px-0">
                                <hr>
                            </div>
                        </div>

                        <!-- Add Review -->

                        <!-- Add Review -->

                        <div class="row">
                            <div class="col-12 px-md-3 px-0">
                                <h4>Commentaires</h4>
                                <hr>
                            </div>
                        </div>

                        <!-- Review -->
                        <div class="row">
                            <div class="col-12">

                                <!-- Comments -->
                                <div class="col-12 text-justify py-2 mb-3 bg-gray">
                                    @foreach ($produit->commentaires as $comment)


                                    <div class="row">
                                        <div class="col-12">
                                            <strong class="mr-2">{{ $comment->user->name }}</strong>
                                            <small>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </small>
                                        </div>
                                        <div class="col-12">
                                            {{ $comment->commentaire }}
                                        </div>
                                        <div class="col-12">
                                            <small>
                                                <i class="fas fa-clock mr-2"></i>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </small>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <!-- Comments -->



                            </div>
                        </div>
                        <!-- Review -->

                    </div>
                </div>
                <!-- Ratings & Reviews -->

            </div>
        </div>

        <!-- Similar Product -->
        <div class="col-12">
            <div class="row">
                <div class="col-12 py-3">
                    <div class="row">
                        <div class="col-12 text-center text-uppercase">
                            <h2>Autres Produits</h2>
                        </div>
                    </div>
                    <div class="row">

                       @foreach ($produit->user->produits as $prod)
                          <!-- Product -->
                          <div class="col-lg-3 col-sm-6 my-3">
                            <div class="col-12 bg-white text-center h-100 product-item">
                                <div class="row h-100">
                                    <div class="col-12 p-0 mb-3">
                                        <a href="{{ route('produits.show', $prod->id) }}">
                                            <img src="{{ asset('storage/images/'.$prod->image)  }}" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <a href="product.html" class="product-name">{{ $prod->name }}</a>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <span class="product-price">
                                            $ {{ $prod->price }}
                                        </span>
                                    </div>
                                    <div class="col-12 mb-3 align-self-end">
                                        <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus mr-2"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product -->

                       @endforeach



                    </div>
                </div>
            </div>
        </div>
        <!-- Similar Products -->

    </main>
    <!-- Main Content -->
</div>

@endsection