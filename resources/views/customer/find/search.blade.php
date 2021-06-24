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

    <!--Categories -->

    <div class="container">
        <div class="row">
            <div class="col-lg-2 pb-2 card">
                <br>
                <h4 class="text-center"><b>Filter</b></h4>
                <br>

                <form action="{{ route('products.searchfilter') }}" method="GET">
                    @csrf
                    <button type="submit"> FILTER</button>
                    <div class="links d-sm-flex flex-sm-row d-lg-flex flex-lg-column">




                        <h4><b>Price Range
                                (make it UI RANGE)</b></h4>

                        <label for="">min</label>
                        <input type="number" name="min" value="">
                        <label for="">max</label>
                        <input type="number" name="max" value="">

                        <br>
                        <h4><b>Ratings</b></h4>
                        @for ($i = 1; $i < 6; $i++)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                    value="{{ $i }}">
                                <label class="form-check-label" for="exampleRadios1">
                                    {{ $i }} star
                                </label>
                            </div>
                        @endfor

                        <h4><b>Categories</b></h4>

                        @foreach ($categories as $c)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category" id="exampleRadios1"
                                    value="{{ $c->product_categoryid }}">
                                <label class="form-check-label" for="exampleRadios1">
                                    {{ $c->categories }}
                                </label>
                            </div>
                        @endforeach
                        <h4><b>Keywords</b></h4>
                        @foreach ($keys as $k)
                            <div class="form-check">


                                <input class="form-check-input" type="checkbox" name="keywords[]" value="{{ $k->keyword_id }}"
                                    id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    {{ $k->keyword_name }}
                                </label>

                            </div>
                        @endforeach
                    </div>
            </div>
            </form>

            <!-- Featured Items -->
            <div class="col-lg-10">
                <div class="featured d-flex align-items-left justify-content-left">
                    <h1><strong>Search Results...</strong></h1>

                </div>


                <div class="row">
                    @foreach ($products as $product)
                        <a href="{{ route('customer.product.show', ['id' => $product->product_id]) }}">
                            <div class="col-lg-3 mb-1">
                                <div class="card text-center">
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
                        </a>
                        <h6 class="text-center mt-2"> By: <a
                                href="{{ route('retailer.store.front', ['id' => $product->retailer->retailer_id]) }}">{{ $product->retailer->store->store_name }}</a>
                        </h6>
                        <br>
                        @include('includes.rating', ['product' => $product])
                        <form action="{{ route('customer.cart.add', ['id' => $product->product_id]) }}" method="POST">
                            @csrf

                            {{-- <div class="text-center mb-2">
                                        <button class="btn btn-success btn-sm" type="submit">
                                            <i class="fas fa-shopping-cart mr-1"></i>Add to cart</button>
                                    </div> --}}

                        </form>
                </div>
                <br>

            </div>
            @endforeach
        </div>
    </div>
    </div>
    </div>

@endsection
