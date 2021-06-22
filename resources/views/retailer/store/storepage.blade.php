@extends ('layouts/template')

@section('content')

    <img class=" card-image" src="" alt="cover photo "
        onerror=" this.onerror=null;this.src='{{ asset('/css/default-cover.jpg') }}' ;">

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
                    <a class="btn btn-block btn-dark text-uppercase my-2 mx-a"
                        href="{{ route('retailer.products.create', 'plant') }}">
                        add a plant
                    </a>
                    <a class="btn btn-block btn-dark text-uppercase my-2 mx-a"
                        href="{{ route('retailer.products.create', 'product') }}">
                        add a product
                    </a>
                    @if ($store->store_id == Auth::id())
                        <a href="{{ route('retailer.store.edit') }}"
                            class="btn btn-block btn-dark text-uppercase my-2 mx-a">
                            Update Store Page
                        </a>

                        <a href="{{ route('retailer.products.index') }}"></a>
                        <br>
                        <a href="{{ route('retailer.products.front') }}"
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
            </div>
            <div class="div class= card-body table-responsive-sm">

                @forelse ($store->store->products as $product)

                    <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                        <a href="
                                                                                @if ($store->store_id
                            == Auth::id()) {{ route('retailer.products.show', $product->product_id) }}
                        @else
                            {{ route('customer.product.show', $product->product_id) }} @endif
                            ">
                            <img src="{{ asset('/storage/' . $product->product_mainphoto) }}" height="490"
                                alt="background">
                            <br>

                            <h4>{{ $product->product_name }}</h4> <br>
                            <h5>price</h5>
                            <b>{{ $product->product_price }} PHP</b><br>
                            <b>Stocks ({{ $product->product_quantity }} X) </b>


                            <div class="container">
                                <div class="col-lg-10">
                                    <h3 class="featured d-flex align-items-left justify-content-left">
                                        {{ $store->store_name }}</h3>
                                </div>
                                <div class="row">
                                    @forelse ($store->store->products as $product)

                                        <div class="col-lg-2 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                                            <a href="@if ($store->store_id == Auth::id()) {{ route('product_show', ['id' => $product->product_id]) }}
                                            @else
                                                {{ route('customer.product.show', ['id' => $product->product_id]) }} @endif
                                                ">
                                                <img src="{{ asset('/storage/' . $product->product_mainphoto) }}"
                                                    height="490" alt="background">
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
                @endsection
