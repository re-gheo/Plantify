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

<!-- Categories -->
<div class="container">
    <div class="row">
        <div class="col-lg-2 pb-2 card">
            <br>
            <h4 class="text-center"><b>CATEGORIES</b></h4>
            <br>
            <div class="links d-sm-flex flex-sm-row d-lg-flex flex-lg-column">
                <button class="btn btn-success btn-sm">
                    <a href="{{ url('category1')}}" class="text-white ml-3">Category 1<i class="fas fa-chevron-right ml-3"></i></a>
                </button>

                <br>

                <button class="btn btn-success btn-sm">
                    <a href="{{ url('category2')}}" class="text-white ml-3">Category 2<i class="fas fa-chevron-right ml-3"></i></a>
                </button>

                <br>

                <button class="btn btn-success btn-sm">
                    <a href="{{ url('category3')}}" class="text-white ml-3">Category 3<i class="fas fa-chevron-right ml-3"></i></a>
                </button>
                
                <br>

                <button class="btn btn-success btn-sm">
                    <a href="{{ url('category4')}}" class="text-white ml-3">Category 4<i class="fas fa-chevron-right ml-3"></i></a>
                </button>
                
                <br>

                <button class="btn btn-success btn-sm">
                    <a href="{{ url('category5')}}" class="text-white ml-3">Category 5<i class="fas fa-chevron-right ml-3"></i></a>
                </button>

                <br>

                <button class="btn btn-success btn-sm">
                    <a href="{{ url('category6')}}" class="text-white ml-3">Category 6<i class="fas fa-chevron-right ml-3"></i></a>
                </button>

                <br>

                <button class="btn btn-success btn-sm">
                    <a href="{{ url('category7')}}" class="text-white ml-3">Category 7<i class="fas fa-chevron-right ml-3"></i></a>
                </button>
            </div>
        </div>

<!-- Category 1 -->
<div class="col-lg-10">
    <div class="featured d-flex align-items-left justify-content-left">
        <h1><strong>Category 5</strong></h1>
    </div>
    <div class="row">
        {{-- @foreach ($products as $product) --}}
            <a href="{{ route('customer.product.show', ['id' => 1]) }}">
            <div class="col-lg-3 mb-1">
                <div class="card text-center">
                    {{-- @if ($product->product_mainphoto) --}}
                        <div class="items"></div>
                        <img class="rounded mx-auto d-block" width="100" height="100"
                            src=""
                            alt="no_image_available">
                    {{-- @else --}}
                        <img class="rounded mx-auto d-block" width="100" height="100"
                            src="" alt="default_photo">

                    {{-- @endif --}}
               
                    <h5 class="text-center">$product->product_name</h5> </a>  
                    <h6 class="text-center mt-2"> By: 
                        {{-- <a href="{{ route('retailer.store.front', ['id' => $product->retailer->retailer_id]) }}">{{ $product->retailer->store->store_name }}</a> --}}
                        
                        <a href="{{ route('retailer.store.front', ['id' => 1]) }}"> $product->retailer->store->store_name</a>
                    </h6>
                    <br>
                    {{-- @include('includes.rating', ['product' => $product]) --}}
                    <form action="{{ route('customer.cart.add', ['id' => 1]) }}"
                        method="POST">
                        @csrf
                       
                        {{-- <div class="text-center mb-2">
                            <button class="btn btn-success btn-sm" type="submit">
                                <i class="fas fa-shopping-cart mr-1"></i>Add to cart</button>
                        </div> --}}

                    </form>
                </div>
                <br>

            </div>
        {{-- @endforeach --}}
    </div>
</div>

@endsection