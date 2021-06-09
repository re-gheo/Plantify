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
                        <div class="product col-lg-4 col-md-6 col-xs-12 mb-1">
                            <div class="card">
                                @if ($product->product_mainphoto)
                                    <img class="" width="150" height="150"
                                        src="{{ asset('/storage/' . $product->product_mainphoto) }}"
                                        alt="no_image_available">
                                @else
                                    <img class="" width="150" height="150"
                                        src="{{ asset('/img/' . 'default-photo.png') }}" alt="default_photo">

                                @endif
                                <h5 class="text-center">{{ $product->product_name }}</h5>
                                <small> By: <a
                                        href="{{ route('retailer.store.front', ['id' => $product->retailer->retailer_id]) }}">{{ $product->retailer->store->store_name }}</a></small>
                                @include('includes.rating', ['product' => $product])
                                <form action="{{ route('customer.cart.add', ['id' => $product->product_id]) }}"
                                    method="POST">
                                    @csrf
                                    {{-- {{ $product->product_id }} --}}
                                    <button class="btn btn-success btn-sm" type="submit">Add to cart</button>
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
