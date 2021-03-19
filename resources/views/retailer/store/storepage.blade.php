@extends ('layouts/template')

@section('content')

    {{-- BANNER IMAGE --}}

    <div class="card">
        <img class=" card-image" src="" alt="cover photo "
            onerror=" this.onerror=null;this.src='{{ asset('/css/default-cover.jpg') }}' ;">

        @if ($store->store_backgroundimage != null)

            <img class="store-avatar" src="{{ asset('/storage/' . $store->store_backgroundimage) }} ">
            <hr>
        @else
            <img class="store-avatar" src="{{ asset('/css/default-image.svg') }}">
            <hr>
        @endif
    </div>




    {{-- PROFILE IMAGE --}}
    <div class="card-container mt-4 ml-5">
        @if ($store->store_name != null)

            <img class="store-avatar" src="{{ asset('/storage/' . $store->store_profileimage) }} ">
            <hr>
        @else
            <img class="store-avatar" src="{{ asset('/css/default-image.svg') }} ">
            <hr>
        @endif


       
        <div class="card-body">
            <div class="title-div">
                <h5 class="card-title text-center text-white font-weight-bold">{{ $store->store_name }}</h5>
            </div>

            <br>
            <p class="card-text text-center text-white">{{ $store->store_description }}</p>
            {{-- <br>
            <a href="#" class="btn btn-block btn-dark text-uppercase my-2 mx-a">Go somewhere</a> --}}
            <br>
            <a href="{{ route('retailer.store.edit') }}" class="btn btn-block btn-dark text-uppercase my-2 mx-a">Update
                Store Page</a>
            <br>
            <a href="{{ route('retailer.products.front') }}" class="btn btn-block btn-dark text-uppercase my-2 mx-a"> My
                product</a>
        </div>
    </div>

    <div class="card-container mt-4 ml-5">
        

       
        <div class="card-body">
            <div class="title-div">
                <h5 class="card-title text-center text-white font-weight-bold"> My Orders</h5>
            </div>

            <br>
           
            <a href="{{ route('retailer.order.list') }}" class="btn btn-block btn-dark text-uppercase my-2 mx-a">
               Go To My Orders</a>
            <br>
        </div>
    </div>






    <p></p>


    </div>
    </div>















@endsection
