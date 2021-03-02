@extends ('layouts/template')

@section('content')
    <div class="col-lg-10 mr-auto ml-auto" id="selecitem">
        <h1> <b>My cart</b></h1>

        @forelse($carts as $key => $c1)
            <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">

                @if (date($key) == Carbon\Carbon::today('Asia/Manila')->toDateString())
                    <h1><b> Today's Cart </b></h1>
                    <p>[{{ date($key) }}]</p>
                @else
                    <h1>{{ date($key) }}</h1>
                @endif

                @forelse ($c1 as $i)

                    <div>
                        <div style="width: 120px; float: left;">
                            <img src="{{ url('/storage/' . $i->product_mainphoto) }}" height="100" alt="background">
                        </div>
                        <div style="margin-left: 6px;">
                            <div>
                                <h4>{{ $i->product_name }}</h4>
                                <h5>price</h5>
                                <b>{{ $i->product_price }} PHP</b>
                                <br>
                                <br>
                                <h5>total</h5>
                                <b>{{ $i->cart_subtotal }} PHP</b>
                            </div>
                            {{--  --}}
                            <label for="">Quantity</label>
                            <form action="/store/cart/quantity/{{ $i->cart_itemid }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="quantity" id="" value="{{ $i->cart_quantity }}" required>
                                <button type="submit"> Edit Quantity</button>
                            </form>

                        </div>
                        <div style="margin-left: 400px;">

                            <label for="">include in check out</label>

                            <input type="checkbox" name="checkoutid" id="checkout" value="{{ $i->cart_itemid }}"
                                onclick="GetSelected()">
                            <form name="another" action="/store/cart/remove/{{ $i->product_id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark"> Remove Item</button>
                            </form>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        @empty
            <h1>Oh! your cart is empty, try to add an item</h1>
        @endforelse
        @if (isset($carts))
        @endif
    </div>
    <form action="/store/itemcheckout" method="POST">
        @csrf
        <input type="hidden" name="hidid" id="mysel">
        <button type="submit"> CHECKOUT SELECTED PRODUCTS</button>
    </form>

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

@endsection
