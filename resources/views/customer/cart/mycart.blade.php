@extends ('layouts/template')

@section('content')
<div class="col-lg-10 mr-auto ml-auto">
<h1> My cart</h1>

@forelse($carts as $c)
<div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
    <a href="/store/products/{{$product->product_id}}">
        <img src="{{ url('/storage/' . $product->product_mainphoto) }}"  height="490" alt="background">
   <br>
</div>
@empty
    <h1>Oh! your cart is empty</h1>
@endforelse
    
</div>
@endsection
