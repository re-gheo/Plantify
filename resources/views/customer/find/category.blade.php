@extends('layouts.template')

@section('content')

    {{-- {{ $category->description }} --}}
    <!-- Carousel -->
    <div class="container mt-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('/img/ad1.png') }}" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/img/default-cover.png') }}" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/img/default-cover.png') }}" alt="">
                </div>
            </div>

            <hr>

            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- Categories -->
    <div class="container">
        <div class="row">
            <div class="col-lg-2 pb-2 card">
                <br>
                <h4 class="text-center"><b>CATEGORIES</b></h4>
                <hr>
                <div class="links d-sm-flex flex-sm-row d-lg-flex flex-lg-column">
                    @foreach ($categories as $c)
                        <button class="btn btn-success btn-sm">
                            <a href="{{ route('products.category', $c->product_categoryid) }}" class="text-white ml-3">
                                <h6>{{ $c->categories }}</h6>
                            </a>
                        </button>
                        <br>
                    @endforeach
                </div>
            </div>

            <!-- Category 1 -->
            <div class="col-lg-10">
                <div class="featured d-flex align-items-left justify-content-left">
                    <h3><strong>{{ $category->categories }}</strong></h3>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <a href="{{ route('customer.product.show', $product->product_id) }}">
                            <div class="col-lg-3 mb-1">
                                <div class="card text-center">
                                    @if ($product->product_mainphoto)
                                        <div class="items"></div>
                                        {{-- <img class="rounded mx-auto d-block" width="100" height="100" src=""
                                            alt="no_image_available"> --}}
                                            <img src="{{ asset('/img/' . 'default-photo.png') }}" class="rounded mx-auto d-block" width="100" height="100" src=""
                                            alt="default_photo">
                                    @else
                                        <img src="{{ asset('/img/' . 'default-photo.png') }}" class="rounded mx-auto d-block" width="100" height="100" src=""
                                            alt="default_photo">

                                    @endif

                                    {{-- Name of product --}}
                                    <h5 class="text-center">{{$product->product_name}}</h5>
                        </a>
                        <h6 class="text-center mt-2"> By:
                            {{-- Store Name --}}
                            <a href="{{ route('retailer.store.front', ['id' => $product->retailer->retailer_id]) }}">{{ $product->retailer->store->store_name }}</a>

                            {{-- <a href="{{ route('retailer.store.front', ['id' => 1]) }}">
                                {{$product->retailer->store->store_name}}</a> --}}
                        </h6>
                        <br>
                        @include('includes.rating', ['product' => $product])
                        {{-- <form action="{{ route('customer.cart.add', ['id' => 1]) }}" method="POST">
                            @csrf

                            <div class="text-center mb-2">
                                <button class="btn btn-success btn-sm" type="submit">
                                    <i class="fas fa-shopping-cart mr-1"></i>Add to cart</button>
                            </div>

                        </form> --}}
                </div>
                <br>

            </div>
            @endforeach
        </div>
    </div>

@endsection
