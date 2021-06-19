@extends ('layouts/template')

@section('content')

    <div class="row">
        <div class="col-lg-10 mr-auto ml-auto">


            <div class="container">
                <h3 class="text-center">{{ $store->store_name }}</h3>
                <h6 class="text-center">Products List</h3>
            </div>
            <div class="div class= card-body table-responsive-sm">

                @forelse ($store->products as $product)

                    <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                        <a href="{{ route('retailer.products.show', ['id' => $product->product_id]) }}">
                            <img src="{{ asset('/storage/' . $product->product_mainphoto) }}" height="490" alt="background">
                            <br>

                            <h4>{{ $product->product_name }}</h4> <br>
                            <h5>price</h5>
                            <b>{{ $product->product_price }} PHP</b><br>
                            <b>Stocks ({{ $product->product_quantity }} X) </b>

                        </a>
                    </div>
                @empty
                    <div class="col-lg-8 col-xl-6   mx-auto mt-5  p-3border-3 ">
                        <h1>OH! Seems to be empty.</h1>
                    </div>
                @endforelse
            </div>

        </div>

    </div>

    </div>
    <div>
    </div>

    </div>

@endsection
