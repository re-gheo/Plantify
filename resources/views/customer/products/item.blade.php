@extends('layouts.template')

@section('content')
    @if (!Auth::user())
    @else
        @if ($product->product_id == Auth::user()->id)
            <b>I own this Product</p>
                <a href="{{ route('retailer.products.index') }}" class="btn btn-dark"> Go to my product list</a>
        @endif
    @endif

    @if (!Auth::user())
    @else
        @if ($product->retailer_id == Auth::user()->id)

            <a class="btn btn-dark" href=" {{ route('retailer.products.edit', ['id' => $product->product_id]) }}"> edit products</a>
        @endif
    @endif
    
    <br>
    <div class="container mt-2 card">
        <br>
        <div class="card">
        <br>
        <div class="text-center">
            <h1><strong>{{ $product->product_name }}</strong></h1>
            <p>Product of: <a href="{{route('retailer.store.front', ['id' => $product->retailer->retailer_id])}}">{{$product->retailer->store->store_name }}</a></p>
        </div>

                {{-- Dunno why no keys appear here, will consult with reig --}}
                <div class="text-center">
                    <p>Keywords go here...</p>
                    @foreach ($askeys as $ask)
                        <p>: {{ $ask->keyword_name }} </p>
                    @endforeach
                </div>

        <br>

        </div>

        <hr>
        <div class="container">
        <h5 class="text-center">Product Preview... Text to be removed once picture issue is resolved</h5>
        <div id="pic" class="carousel row slide col-lg-6 pull-left" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#pic" data-slide-to="0" class="active"></li>

                <?php $i = 1; ?>

                @foreach ($asphotos as $asp)
                    <li data-target="#pic" data-slide-to="{{ $i++ }}" class="active"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active ">
                    <img src="{{ asset('/storage/' . $product->product_mainphoto) }}" alt="">
                </div>

                @foreach ($asphotos as $asp)
                    <div class="carousel-item">
                        <img src="{{ asset('/storage/' . $asp->product_photo) }}" alt="">
                    </div>
                @endforeach


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

            @if (isset($product->product_sizes))
            <h5><b>Scientific Name: </b> {{ $product->plant_scientificname }}</h5><br>
            @endif

            <h5><b>PRICE: </b>{{ $product->price }}PHP</h5><br>

            <h5><b>Current Stocks: </b>{{ $product->product_quantity }} Items </h5><br>

            @if (isset($product->product_sizes))
            <h5><b>Size of the plant: </b>{{ $product->product_sizes }} inches</h5><br>
            @endif

            <h5 class="text-left"><b>Product Description</b></h5>
            <p>{{ $product->product_description }}</p><br>

            {{-- Add to cart (Need reig's help with this) --}}
        <div class="text-center">
            <form action="{{ route('customer.cart.add', ['id' => $product->product_id]) }}"
                method="POST">
                @csrf
               
                <div class="text-center mb-2">
                    <button class="btn btn-success btn-sm" type="submit">
                    <i class="fas fa-shopping-cart mr-1"></i>Add to cart</button>
                </div>    
            </form>
        </div>

        <div class="text-center">
            {{-- <h4 class="text-center"><b>Ratings:</b></h4> --}}
        @include('includes.ratingProductCustomer', ['product' => $product])
        </div>

        </div>
        </div>
        <hr>

        <br>
        <div class="text-center">
            <h2><b>Questions</b></h2>
            @include('includes.questionProductCustomer', ['product' => $product])
        </div>
        <br>
        <br>
        <br>
        <br>
    </div>

@endsection
