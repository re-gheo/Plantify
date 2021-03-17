@extends ('layouts/template')

@section('content')

    <br>
    <br>
    <div class="container">
        <div class="container mb-4" id="selecitem">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive ">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Product</th>
                                    <th scope="col" class="text-center">Price</th>
                                    <th scope="col" class="text-right">Quantity</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>

                            @forelse($carts as $key => $c1)

                                @if (date($key) == Carbon\Carbon::today('Asia/Manila')->toDateString())
                                    <h1><b> Today's Cart </b></h1>
                                    <p><b>Date of Cart: {{ date($key) }}</b></p>
                                @else
                                    <h1>{{ date($key) }}</h1>
                                @endif

                                @forelse ($c1 as $i)

                                    <tr>
                                        <td>
                                            <img src="{{ asset('/storage/' . $i->product_mainphoto) }}" height="100"
                                                alt="background">
                                        </td>
                                        <td>
                                            <b>{{ $i->product_name }}</b>
                                        </td>
                                        <td>
                                            <b>{{ $i->product_price }} PHP</b>
                                        </td>
                                        <td style="width:20%">

                                            <div class="btn-group">
                                                <form class="cart-form"
                                                    action="{{ route('customer.cart.quantity', ['id' => $i->cart_itemid]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <input class="cart-input mb-2" type="number" name="quantity" id=""
                                                        value="{{ $i->cart_quantity }}" required>
                                                    <button class="btn btn-primary btn-sm" type="submit"> Edit Quantity</button>
                                                </form>
                                            </div>



                                        </td>
                                        <td style="width:30%">
                                            <div class="container">
                                                <div class="btn-group">
                                                    <label for="">include in check out</label>

                                                    <input class="m-2" type="checkbox" name="checkoutid" id="checkout"
                                                        value="{{ $i->cart_itemid }}" onclick="GetSelected()">

                                                    <form class="m-1"
                                                        action="{{ route('customer.cart.remove', ['id' => $i->cart_itemid]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="form-row">
                                                            <button type="submit" class="btn btn-danger btn-sm"> Remove
                                                                Item</button>
                                                        </div>

                                                    </form>
                                                </div>

                                            </div>



                                        </td>
                                    </tr>




                                @empty
                                @endforelse



                            @empty
                                <h3>Oh! your cart is empty </h3>
                                <div class="pull-left mt-3">
                                    <a class="btn btn-dark" href="{{ route('store') }}">Add an item</a>

                                </div>

                            @endforelse
                            @if (isset($carts))
                            @endif


                        </table>
                        <hr>

                        {{-- TOTAL AMOUNT --}}
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 mr-auto ml-auto">
                                    <div class="col-lg-8 col-xl-5 card flex-column mx-auto  shadow p-3border-3 ">
                                        <form action="{{ route('customer.checkout.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="hidid" id="mysel">
                                            <div class="btn-group text-center">
                                                <button class="btn btn-success text-uppercase my-2 mx-a " type="submit">
                                                    <i class="fas fa-shopping-cart"></i>
                                                    CHECKOUT SELECTED PRODUCTS
                                                </button>
                                            </div>

                                        </form>
                                        <h5 class="m-2 text-center">total</h5>
                                        <b class="m-2 text-center">{{ $i->cart_subtotal }} PHP</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col mb-2">
                        <div class="row">
                            <div class="col-sm-12  col-md-6">
                                <button class="btn btn-block btn-light">Continue Shopping</button>
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>



@endsection
