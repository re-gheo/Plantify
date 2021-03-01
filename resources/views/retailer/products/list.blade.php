@extends ('layouts/template')

@section('content')

    <div class="row">
        <div class="col-lg-10 mr-auto ml-auto">


            <div class="container">
                <h3 class="text-center">My Products</h3>
                <a href="/store/products/create/plant" class="btn btn-dark"> Add a Plant Product</a> <br>
                <a href="/store/products/create/product" class="btn btn-dark"> Add a Product</a>
            </div>
            <div class="div class= card-body table-responsive-sm">







                @forelse ($products as $product)

                    <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                        <a href="/store/products/{{ $product->product_id }}">
                            <img src="{{ url('/storage/' . $product->product_mainphoto) }}" height="490" alt="background">
                            <br>

                            <h4>{{ $product->product_name }}</h4> <br>
                            <h5>price</h5>
                            <b>{{ $product->product_price }} PHP</b><br>
                            <b>Stocks ({{ $product->product_quantity }} X) </b>

                        </a>
                        <a href="/store/products/{{ $product->product_id }}/remove" class="btn btn-dark"> remove Product</a>
                    </div>
                @empty
                    <div class="col-lg-8 col-xl-6   mx-auto mt-5  p-3border-3 ">
                        <h1>OH! Seems empty try to<a href="/store/products/create"> Add a Products</a></h1>
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
