@extends('layouts.template')

@section('content')

    <br>
<div class="container card">
    <br>
    <div class="text-center">
        <h1><strong>{{ $plant_referencepage->plant_scientificname }}</strong></h1>
    </div>
    <hr>

    {{-- Kenny fix this --}}
    <div class="align-center card">
        <img src="{{asset('/storage/'. $plant_referencepage->plant_photo)  }}" width="300" height="300" alt="main">
        {{-- <img src="{{ asset('/storage/'.$plant_referencepage->plant_phototwo) }}" width="300" height="300" alt="main">
        <img src="{{ asset('/storage/'.$plant_referencepage->plant_photothree) }}" width="300" height="300" alt="main"> --}}
    </div>

    <br>

    <div class="text-center">
        <label><b>What is the {{ $plant_referencepage->plant_scientificname }}?</b></label>
        <p class="text-left">{{ $plant_referencepage->plant_description }}</p>

    <div class="text-center">
        <label><b>How can you maintain the {{ $plant_referencepage->plant_scientificname }}?</b></label>
        <p class="text-left">{{ $plant_referencepage->plant_maintenance }}</p>
    </div>

    <hr>
    <br>

    <div class="container">
    <h1> <b> Plant Products that align with the Reference</b></h1>
    <br>
    <div class="row">
    @forelse($plant_referencepage->products as $product)
        <a href="{{ route('customer.product.show', $product->product_id) }}">
            <div class="col-lg-3 mb-1">
                <div class="card text-center">
                    @if ($product->product_mainphoto)
                        <div class="items"></div>
                        <img class="rounded mx-auto d-block" width="100" height="100" src="" alt="no_image_available">
                    @else
                        <img class="rounded mx-auto d-block" width="100" height="100" src="" alt="default_photo">

                    @endif

                    <h5 class="text-center">{{ $product->product_name }}</h5>
        </a>
        <h6 class="text-center mt-2"> By:
            <a
                href="{{ route('retailer.store.front', ['id' => $product->retailer->retailer_id]) }}">{{ $product->retailer->store->store_name }}</a>


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


@empty
<h3>Oops... there are no stores selling this product with this yet...</h3>
@endforelse
    </div>

<hr>
<h1> <b>Stores that sell products of the reference</b></h1>
<div class="row text-center">
@forelse($retailer as $key => $r)
<a href="{{ route('retailer.store.front', ['id' => $r->retailer_id]) }}">
    <div class="col-lg-25 mb-1">
        <div class="card text-center">
            <h4>{{ $r->store->store_name }}</h4>
        </div>
    </div>
</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
@empty
    <h3>no Stores selling this plant</h3>
@endforelse
</div>
</div>

<br>

    <div class="text-center">
        <button class="btn btn-success btn-sm">
            <a class="text-white" href="{{ route('plant-information.index') }}">Return to References</a>
        </button>
    </div>

    <br>

</div>
</div>




@endsection
