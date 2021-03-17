@extends('layouts.template')

@section('content')
    <!--CAROUSEL-->
    <div class="container mt-2">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('/css/ad1.png') }}" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/css/ad1.png') }}" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('/css/ad1.png') }}" alt="">
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

    <div class="container mt-2 ">
        <div class="row">

            <div class="categories col-lg-2 pb-2 border-1">
                <h4><strong>Categories</strong></h4>
                <div class="links d-sm-flex flex-sm-row d-lg-flex flex-lg-column">
                    <a href="#" class="link">Herbs</a>
                    <a href="#" class="link">Flowers</a>
                    <a href="#" class="link">Trees</a>

                </div>
            </div>

            <div class="col-lg-10">
                <div class="featured d-flex align-items-left justify-content-left">
                    <h1><strong>Featured Items!</strong></h1>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                        <a href="{{ route('customer.product.show', ['id' => $product->product_id]) }}">
                            <div class="product col-lg-3 col-md-6 col-xs-12 mb-1">
                                <img class="img-fluid" src="{{ asset('/storage/' . $product->product_mainphoto) }}"
                                    alt="some_image">
                                <h5>{{ $product->product_name }}</h5>
                                <p>Lorem ipsum dolor si amet</p>
                                <div class="row">
                                    <div class="star"></div>
                                    <div class="star"></div>
                                    <div class="star"></div>
                                </div>

                        </a>

                        <form action="{{ route('customer.cart.add', ['id' => $product->product_id]) }}" method="POST">
                            @csrf
                            {{-- {{ $product->product_id }} --}}
                            <button class="btn btn-success btn-sm" type="submit">Add to cart</button>
                        </form>
                </div>
                @endforeach
            </div>



        </div>

    </div>
    </div>
@endsection
