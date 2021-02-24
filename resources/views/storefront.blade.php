@extends('layouts.template')

@section('content')

<!--CAROUSEL-->
  <div class="container mt-2">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="/css/ad1.png" alt="">
        </div>
        <div class="carousel-item">
         <img src="/css/ad1.png" alt="">
        </div>
        <div class="carousel-item">
         <img src="/css/ad1.png" alt="">
        </div>
      </div>

      <hr>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
    
<!--CAROUSEL-->
 
  <div class="container">
    <div class="row">
        
      <div class="categories col-lg-2 pb-2 border-1">
          <h4><strong>Categories</strong></h4>
          <div class="links d-sm-flex flex-sm-row d-lg-flex flex-lg-column">
              <a href="#" class="link">Herbs</a>
              <a href="#" class="link">Flowers</a>
              <a href="#" class="link">Trees</a>
              
          </div>
      </div>
     
      <div class="col-lg-10">
          <div class="featured d-flex align-items-left justify-content-left">
            <h1><strong>Featured Items!</strong></h1>
           


          </div>
          <div class="row">

            <!--STORE ITEMS-->
              <div class="product col-lg-3 col-md-6 col-xs-12 mb-1">
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
            </div>
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
          <form action="/store/item/addtocart/{{$product->product_id}}" method="POST">
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