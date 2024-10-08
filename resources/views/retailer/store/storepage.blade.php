@extends ('layouts/template')

@section('content')
    <img class=" card-image" src="" alt="cover photo "
        onerror=" this.onerror=null;this.src='{{ asset('/img/default-cover.png') }}' ;">

    @if ($store->store_backgroundimage != null)

        <img class="store-avatar" src="{{ asset('/storage/' . $store->store_backgroundimage) }} ">
    @else
        <img class="store-avatar" src="{{ asset('/css/default-image.svg') }}">
    @endif

    <div class="row">
        <div class="col-3">
            <div class="card-container ml-5">
                @if ($store->store_name != null)

                    <img class="store-avatar" src="{{ asset('/storage/' . $store->store_profileimage) }} ">
                    <hr>
                @else
                    <img class="store-avatar" src="{{ asset('/css/default-image.svg') }} ">
                    <hr>
                @endif

                <div class="card-body">
                    <div class="title-div">
                        <h5 class="card-title text-center text-white font-weight-bold">{{ $store->store_name }}</h5>
                    </div>

                    <br>
                    <p class="card-text text-center text-white">{{ $store->store_description }}</p>
                    {{-- <br>
                <a href="#" class="btn btn-block btn-dark text-uppercase my-2 mx-a">Go somewhere</a> --}}
                    <br>
                    @if ($store->store_id == Auth::id())
                        <a href="{{ route('retailer.store.edit') }}"
                            class="btn btn-block btn-dark text-uppercase my-2 mx-a">
                            Update Store Page
                        </a>
                        <br>
                        <a href="{{ route('retailer.products.index') }}"
                            class="btn btn-block btn-dark text-uppercase my-2 mx-a">
                            My product
                        </a>
                    @endif
                </div>
            </div>
            @if ($store->store_id == Auth::id())
                <div class="card-container mt-4 ml-5">
                    <div class="card-body">
                        <div class="title-div">
                            <h5 class="card-title text-center text-white font-weight-bold"> My Orders</h5>
                        </div>
                        <br>
                        <a href="{{ route('retailer.order.list') }}"
                            class="btn btn-block btn-dark text-uppercase my-2 mx-a">
                            Go To My Orders
                        </a>
                        <br>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-5">
            <div class="container">
                <h3 class="text-center">{{ $store->store_name }}</h3>
                <h6 class="text-center">Products List</h3>
                    <button class="btn btn-success"><a class="text-white" href="{{route('retailer.products.create','plant')}}">Add Plant</a></button>
                    <button class="btn btn-success"><a class="text-white" href="{{route('retailer.products.create','product')}}">Add Product</a></button>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        @forelse ($store->store->products as $product)
                            <div class="card mt-5 shadow p-3 border-3 ">
                                <a href="
                                @if ($store->store_id == Auth::id()) {{ route('retailer.products.show', $product->product_id) }}
                                @else
                                    {{ route('customer.product.show', $product->product_id) }} @endif
                                    ">
                                    <img class="card-img-top"
                                        src="{{ asset('/storage/' . $product->product_mainphoto) }}" height="490"
                                        alt="background">
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
    </div>
@endsection
