@extends ('layouts/template')

@section('content')

    <div class="container">
        <div class="container mb-4" id="selecitem">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        @forelse ($products as $product)

                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Photo</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Actions</th>
                                    </tr>

                                </thead>



                                <tr>
                                    {{-- PRODUCT PHOTO --}}

                                    <td>
                                        <img class="thumb-photo " src="{{ asset('/storage/' . $product->product_mainphoto) }}"
                                            alt="background">
                                    </td>

                                    {{-- PRODUCT NAME --}}
                                    <td>
                                        <h4>{{ $product->product_name }}</h4> <br>
                                    </td>
                                    {{-- PRODUCT PRICE --}}
                                    <td>
                                        <b>{{ $product->product_price }} PHP</b>
                                    </td>
                                    {{-- PRODUCT QUANTITY --}}
                                    <td>
                                        <b>Stocks ({{ $product->product_quantity }} X) </b>
                                    </td>
                                    {{-- ACTIONS --}}
                                    <td>
                                        <a href="{{ route('retailer.products.remove', ['id' => $product->product_id]) }}"
                                            class="btn btn-danger btn-small">
                                            <i class="fas fa-trash"></i>
                                            remove Product</a>
                                    </td>
                                </tr>
                            </table>

                        @empty
                            <div class="col-lg-8 col-xl-6   mx-auto mt-5  p-3border-3 ">
                                <h1>OH! Seems empty try to add a Products</h1>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-lg-10 mr-auto ml-auto">


            <div class="container">
                <h3 class="text-center">My Products</h3>

                <a href=" {{ route('retailer.products.create', ['type' => 'plant']) }}" class="btn btn-dark"> Add a Plant
                    Product</a> <br>
                <a href="{{ route('retailer.products.create', ['type' => 'product']) }}" class="btn btn-dark"> Add a
                    Product</a>
            </div>
            <div class="div class= card-body table-responsive-sm">

                @forelse ($products as $product)

                    <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                        <a href="{{ route('retailer.products.show', ['id' => $product->product_id]) }}">
                            <div class="container text-center">
                                <img class="main-photo " src="{{ asset('/storage/' . $product->product_mainphoto) }}"
                                    alt="background">
                            </div>

                            <br>

                            <h4>{{ $product->product_name }}</h4> <br>
                            <h5>price</h5>
                            <b>{{ $product->product_price }} PHP</b><br>
                            <b>Stocks ({{ $product->product_quantity }} X) </b>

                        </a>
                        <a href="{{ route('retailer.products.remove', ['id' => $product->product_id]) }}"
                            class="btn btn-dark">
                            remove Product</a>
                    </div>
                @empty
                    <div class="col-lg-8 col-xl-6   mx-auto mt-5  p-3border-3 ">
                        <h1>OH! Seems empty try to add a Products</h1>
                    </div>
                @endforelse






            </div>

        </div>

    </div> --}}

    </div>
    <div>
    </div>

    </div>

@endsection
