@extends('layouts.admin-template')

@section('content')

    <div class="container mt-2 card">
        <br>
        <div class="card">
            <br>
            <div class="text-center">
                <h1><strong>PRODUCT NAME</strong></h1>
                {{-- <p>Product of: <a href="{{route('retailer.store.front', ['id' => $product->retailer->retailer_id])}}">{{$product->retailer->store->store_name }}</a></p> --}}
            </div>

            {{-- Dunno why no keys appear here, will consult with reig --}}
            {{-- <div class="text-center">
                <p>Keywords go here...</p>
                @foreach ($askeys as $ask)
                    <p>: {{ $ask->keyword_name }} </p>
                @endforeach
            </div> -- --}}

            <br>

        </div>

        <hr>
        <div class="container">
            <div id="pic" class="carousel row slide col-lg-6 pull-left" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#pic" data-slide-to="0" class="active"></li>



                    <li data-target="#pic" data-slide-to="" class="active"></li>

                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active ">
                    {{-- NOTE: THIS IS A PLACEHOLDER PHOTO --}}
                        <img src="{{ asset('/img/ad1.png') }}" alt="">
                    </div>
                    {{-- NOTE: THIS IS A PLACEHOLDER PHOTO --}}
                    <div class="carousel-item">
                        <img src="{{ asset('/img/ad1.png') }}" alt="">
                    </div>


                </div>

                <a class="carousel-control-prev" href="#pic" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon dark-gray" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#pic" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>

            <div class="col-lg-6 pull-right">
                <br>
                <br>


                <h5><b>Scientific Name: </b> SCIENTIFIC NAME</h5><br>
                {{-- @endif --}}

                <h5><b>PRICE: </b>PRICE PHP</h5><br>

                <h5><b>Current Stocks: </b> Items </h5><br>


                <h5><b>Size of the plant: </b> inches</h5><br>


                <h5 class="text-left"><b>Product Description</b></h5>
                <p class="text-muted">DESCRIPTION GOES HERE</p>
                <br>

                {{-- Add to cart (Need reig's help with this) --}}
                <div class="container">
                    <div class="row">
                        <button class="btn btn-primary mr-2 text-white"><i class="fas fa-check mr-2"></i>Verify product</button>
                        <button class="btn btn-danger"><i class="fas fa-times mr-2"></i>Unverify product</button>
                    </div>
                </div>


            </div>
        </div>
        <hr>

        <br>


    </div>
@endsection
