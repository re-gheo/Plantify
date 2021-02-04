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
        <div class="ads">
         
        </div>
        <h6>Recent Listings</h6>

      </div>
    </div>

  </div>

@endsection