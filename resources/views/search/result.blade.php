@extends('layouts.template')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-10">
          <div class="featured d-flex align-items-left justify-content-left">
            <h1><strong>Search Results for: </strong></h1>
            @foreach($keywords as $key)
                <h3>{{$key}}</h3> &nbsp
            @endforeach
          </div>


            @foreach($keys as $key)
            <div class="row">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">{{$key->keyword_name}}</h5>
                    @if($key->products->count() > 0)
                        @foreach($key->products as $product)
                        <a href="/store/item/{{ $product->product_id}}">
                            <div class="product col-lg-3 col-md-6 col-xs-12 mb-1">
                            <img class="img-fluid" src="{{ url('/storage/' . $product->product_mainphoto) }}" alt="some_image">
                            <h5>{{$product->product_name }}</h5>
                            <p>Lorem ipsum dolor si amet</p>
                            <div class="row">
                                <div class="star"></div>
                                <div class="star"></div>
                                <div class="star"></div>
                            </div>

                            </a>
                            <form action="/store/cart/addtocart/{{$product->product_id}}" method="POST">
                                @csrf
                                {{$product->product_id}}
                                <button class="btn btn-success btn-sm" type="submit">Add to cart</button>
                            </form>
                        </div>
                        @endforeach
                    @else
                        <h6 class="card-subtitle mb-2 text-muted">No Items Found</h6>
                    @endif

                    </div>
                </div>
            </div>
            @endforeach





      </div>
  </div>
</div>





@endsection
