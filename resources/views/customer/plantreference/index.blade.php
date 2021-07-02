@extends('layouts.reference-template')

@section('content')

        <div class="container mt-5">
            <div class="text-center card">
                <br>
                <h1><strong>General Plant References</strong></h1>
                <p>Welcome to the Plant Reference Page! You can find any relevant plant information here!</p>
                <br>
        </div>
        <hr>

        
        <!-- Plant Categories -->
        <div class="container">
            <div class="row">
                <div class="col-lg-2 pb-2 card">
                    <br>
                    <h4 class="text-center"><b>Categories</b></h4>
                    <hr>
                    <div class="links d-sm-flex flex-sm-row d-lg-flex flex-lg-column">
                 @foreach($categories as $pcategory)
                    <button class="btn btn-success btn-sm">
                        <a href="{{ route('products.category', $pcategory->product_categoryid)}}" class="text-white ml-3">
                            <h6>{{ $pcategory->categories }}</h6>
                        </a>
                    </button>
                    <br>
                 @endforeach
    
                    </div>
                </div>
    
                <!-- General Plant References -->
                <div class="col-lg-10">
                    <div class="featured d-flex align-items-left justify-content-left">
                        <h1><strong>All Plants</strong></h1>
                    </div>
                    <div class="row">
                        @foreach ($plant_referencepages as $ref)
                            <a href="{{ route('plant-information.show', [$ref->plant_referenceid]) }}">
                            <div class="col-lg-3 mb-1">
                                <div class="card text-center">
                                    @if ($ref->plant_photo)
                                        <div class="items"></div>
                                        <img class="rounded mx-auto d-block" width="100" height="100"
                                            src="{{ asset('/storage/' . $ref->plant_photo) }}"
                                            alt="no_image_available">
                                    @else
                                        <img class="rounded mx-auto d-block" width="100" height="100"
                                            src="{{ asset('/img/' . 'default-photo.png') }}" alt="default_photo">
    
                                    @endif
                               
                                    <h5 class="text-center">{{ $ref->plant_scientificname }}</h5></a>  
                                    <br>
                                </div>
                                <br>
    
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

@endsection
