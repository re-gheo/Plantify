@extends('layouts.template')

@section('content')
    <!--CAROUSEL-->
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
                    <img src="{{ asset('/css/default-cover.jpg') }}" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/css/default-cover.jpg') }}" alt="">
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

    <!--CAROUSEL-->

    <div class="container">
        <div class="row">
            <div class="col-lg-2 pb-2">
                <h4>Categories</h4>
                <div class="links d-sm-flex flex-sm-row d-lg-flex flex-lg-column">
                    <a href="#" class="link">Flowering Plant (1 seed leaf)</a>
                    <a href="#" class="link">Flowering Plant (2 seed leaf)</a>
                    <a href="#" class="link">Non Flowering Plant (Ginkgo)</a>
                    <a href="#" class="link">Non Flowering Plant (Cycads)</a>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="featured d-flex align-items-left justify-content-left">
                    <h1><strong>Featured Items!</strong></h1>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <a href="{{ route('customer.product.show', ['id' => $product->product_id]) }}"></a>
                        <div class="col-lg-3 mb-1">
                            <div class="card">
                                @if ($product->product_mainphoto)
                                    <div class="items"></div>
                                    <img class="rounded mx-auto d-block" width="100" height="100"
                                        src="{{ asset('/storage/' . $product->product_mainphoto) }}"
                                        alt="no_image_available">
                                @else
                                    <img class="rounded mx-auto d-block" width="100" height="100"
                                        src="{{ asset('/img/' . 'default-photo.png') }}" alt="default_photo">

                                @endif
                                <h5 class="text-center">{{ $product->product_name }}</h5>
                                <h6 class="text-center mt-2"> By: <a
                                        href="{{ route('retailer.store.front', ['id' => $product->retailer->retailer_id]) }}">{{ $product->retailer->store->store_name }}</a>
                                </h6>
                                @include('includes.rating', ['product' => $product])
                                <form action="{{ route('customer.cart.add', ['id' => $product->product_id]) }}"
                                    method="POST">
                                    @csrf
                                   
                                    <div class="text-center mb-2">
                                        <button class="btn btn-success btn-sm" type="submit">
                                            <i class="fas fa-shopping-cart mr-1"></i>Add to cart</button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
