@extends('layouts.template')

@section('content')
    {{-- {{ dd($plant_reference ,$plant_reference->products ) }} --}}
    <style>
        /* temporary */
        .center {
            text-align: center;
            border: 3px solid green;
        }

    </style>
    <div class="center">
        Plant information
        <br>
        {{-- {{ $plant_reference }} --}}

        <h3><b>plant_scientificname</b></h3>


        <h2><u><b>{{ $plant_reference->plant_scientificname }}</b></u></h2>
        <h3> <b> plant_description</b></h3>
        {{ $plant_reference->plant_description }}
        <h3> <b> plant_maintenance</b></h3>
        {{ $plant_reference->plant_maintenance }}

        <h1>INSERT plant_reference->IMAGES HERE or TOP </h1>

        <hr>

        <h1> <b> Plant Products that align with the Reference</b>
        </h1>
        @forelse($plant_reference->products as $product)
            <a href="{{ route('customer.product.show', ['id' => 1]) }}">
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
            <form action="{{ route('customer.cart.add', ['id' => 1]) }}" method="POST">
                @csrf

                <div class="text-center mb-2">
                    <button class="btn btn-success btn-sm" type="submit">
                        <i class="fas fa-shopping-cart mr-1"></i>Add to cart</button>
                </div>

            </form>
    </div>
    <br>

    </div>
@empty
    <h3>Oops... there are no stores selling this product with this yet...</h3>
    @endforelse

    <hr>
    <h1> <b>Stores that sell products of the referece</b></h1>
    @forelse($retailer as $key => $r)
    <a href="{{ route('retailer.store.front', ['id' => $r->retailer_id]) }}">
        <div class="col-lg-3 mb-1">
            <div class="card text-center">
                <h4>{{ $r->store->store_name }}</h4>
            </div>
        </div>
    </a>
    @empty
        <h3>no Stores selling this plant</h3>
    @endforelse
    </div>
@endsection
