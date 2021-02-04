@extends('layouts.template')

@section('content')
<!--region mainregion-->
  <style>
    a.category-link  {
    text-decoration: none;
    color: #707070;
    padding-left: .5rem;
    padding-top: .5rem;
}

.ads{
  width: 100%;
  height: 200px;
  background-color:blue;
}



  </style>
  
  <div class="container-fluid px-3 py-3 ">
    <div class="row">
      <div class="col-lg-3">
        <h3><strong>Categories</strong></h3>
        <div class="d-sm-flex flex-sm-row d-lg-flex flex-lg-column">
          <a class="category-link" href="#">Indoor Plants</a>
          <a class="category-link" href="#">Outdoor Plants</a>
          <a class="category-link" href="#">Aquatic Plants</a>
        </div>

      </div>
      <div  class="col-lg-9">
        @if(Auth::user())
                    <h2>Welcome! {{Auth::user()->email}}</h2>
                @endif
        <div class="ads"> 
        </div>
        <div class="featured d-flex align-items-center justify-content-center">
          <h5>Recent Listings</h5>
        </div>
        <div class="row">
            <div class="product col-lg-3 col-md-6 col-xs-12 mb-1">
              <img class="img-fluid" src="/css/cactus.jpg" alt="some_image">
              <h5>Product Name</h5>
              <p>Lorem ipsum dolor si amet</p>
              <div class="row">
                  <div class="star"></div>
                  <div class="star"></div>
                  <div class="star"></div>
              </div>
              <button class="btn btn-danger btn-sm">Add to cart</button>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection