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
                                    <th scope="col" class="text-right">Subtotal Price</th>
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


                                        <td>
                                            <b class="m-2 text-center"> PHP {{ $i->cart_subtotal }} </b>
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
                                    <div class="col-lg-8 col-xl-5  flex-column mx-auto  shadow p-3 ">
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

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        function GetSelected() {
            var selected = new Array();
            var prId = document.getElementById("selecitem");
            var chks = prId.getElementsByTagName("INPUT");
            for (var i = 0; i < chks.length; i++) {
                if (chks[i].checked) {
                    selected.push(chks[i].value);
                }
            }
            if (selected.length > 0) {
                document.getElementById("mysel").value = "[" + selected.join(",") + "]";
            }
            if (selected.length == 0) {
                document.getElementById("mysel").value = null;
            }
        };

    </script>









    <script type="text/javascript">
        function GetSelected() {
            var selected = new Array();
            var prId = document.getElementById("selecitem");
            var chks = prId.getElementsByTagName("INPUT");
            for (var i = 0; i < chks.length; i++) {
                if (chks[i].checked) {
                    selected.push(chks[i].value);
                }
            }
            if (selected.length > 0) {
                document.getElementById("mysel").value = "[" + selected.join(",") + "]";
            }
            if (selected.length == 0) {
                document.getElementById("mysel").value = null;
            }
        };

    </script>

    </div>
    </div>



    @forelse($carts as $key => $c1)

        @if (date($key) == Carbon\Carbon::today('Asia/Manila')->toDateString())

            <p>[{{ date($key) }}]</p>
        @else
            <h1>{{ date($key) }}</h1>
        @endif

        @forelse ($c1 as $i)

            <h4>{{ $i->product_name }}</h4>



            <b>{{ $i->product_price }} PHP</b>

            <b>{{ $i->cart_subtotal }} PHP</b>



            </div>

        @empty
        @endforelse
        </div>
    @empty
        <h3>Oh! your cart is empty </h3>
        <div class="pull-left mt-3">
            <a class="btn btn-dark" href="{{ route('store') }}">Add an item</a>

        </div>

    @endforelse



@endsection
