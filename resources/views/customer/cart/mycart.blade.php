@extends ('layouts/template')

@section('content')
    <div class="col-lg-10 mr-auto ml-auto">
        <h1> <b>My cart</b></h1>

        @forelse($carts as $key => $c1)
            <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                
                @if(date($key) ==  Carbon\Carbon::today('Asia/Manila')->toDateString())
                <h1><b> Today's Cart </b></h1> <p>[{{ date($key) }}]</p>
                @else 
                <h1>{{ date($key) }}</h1>
                @endif
                @forelse ($c1 as $i)
                    <div>
                        {{-- <a href="/store/products/{{$i->product_id}}"> --}}
                        <div style="width: 120px; float: left;">
                            <img src="{{ url('/storage/' . $i->product_mainphoto) }}" height="100" alt="background">
                        </div>

                        <div style="margin-left: 6px;">
                            <div>
                                <h4>{{ $i->product_name }}</h4>
                                <h5>price</h5>
                                <b>{{ $i->product_price }} PHP</b>

                            </div>
                            <label for="">Quantity</label>
                            <input type="number" name="" id="" value="{{ $i->cart_quantity }}">
                        </div>

                        <div style="margin-left: 400px;">
                            {{-- <a href= class="btn btn-dark"> remove Product</a> --}}
                            <form action="/store/cart/remove/{{$i->product_id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark"> Remove</button>
                            </form>
                            <label for="">include in check out</label>
                            <input type="checkbox" name="checkout[]" id="checkout">
                        </div>







                        {{-- </a> --}}

                    </div>
                @empty
                    <h1>Oh! your cart is empty</h1>
                @endforelse

            </div>
        @empty
            <h1>Oh! your cart is empty, try to add an item</h1>
        @endforelse



    </div>
@endsection
