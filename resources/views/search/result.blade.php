@extends('layouts.template')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-lg-10">
          <div class="featured d-flex align-items-left justify-content-left">
            <h1><strong>Search Results for: </strong></h1>
            @foreach($keywords as $keyword)
                <h6>{{$keyword->keyword_name}}</h6> &nbsp
            @endforeach
          </div>
          <div class="row">

            <!--STORE ITEMS-->
              {{-- <div class="product col-lg-3 col-md-6 col-xs-12 mb-1">
                  <img class="img-fluid" src="https://images.unsplash.com/photo-1485955900006-10f4d324d411?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1052&q=80" alt="some_image">
                  <h5> DUMMY Product Name</h5>
                  <p>Lorem ipsum dolor si amet</p>
                  <div class="row">
                      <div class="star"></div>
                      <div class="star"></div>
                      <div class="star"></div>
                  </div>
                  <button class="btn btn-success btn-sm">Add to cart</button>
              </div>
              <div class="product col-lg-3 col-md-6 col-xs-12 mb-1">
                <img class="img-fluid" src="https://images.unsplash.com/photo-1485955900006-10f4d324d411?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1052&q=80" alt="some_image">
                <h5>Dummy Product Name</h5>
                <p>Lorem ipsum dolor si amet</p>
                <div class="row">
                    <div class="star"></div>
                    <div class="star"></div>
                    <div class="star"></div>
                </div>
                <button class="btn btn-success btn-sm">Add to cart</button>
            </div> --}}
        @foreach($products as $product)

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
          </div>


      </div>
  </div>
</div>





@endsection
