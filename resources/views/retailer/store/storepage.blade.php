@extends ('layouts/template')

@section('content')

    {{-- BANNER IMAGE --}}

    <div class="card">
        <img class=" card-image" src="{{ url('/storage/' . $store->store_backgroundimage) }}" alt="cover photo "
            onerror=" this.onerror=null;this.src='/css/default-cover.jpg' ;">
    </div>




    {{-- PROFILE IMAGE --}}
    <div class="card-container mt-4 ml-5" style="width: 20rem; ">
        <img class="store-avatar" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }} "
            onerror="this.onerror=null;this.src='/css/default-image.svg' ;">
        <hr>
        <div class="card-body">
            <div class="title-div">
                <h5 class="card-title text-center text-white font-weight-bold">{{ $store->store_name }}</h5>
            </div>

            <br>
            <p class="card-text text-center text-white">{{ $store->store_description }}</p>
            {{-- <br>
            <a href="#" class="btn btn-block btn-dark text-uppercase my-2 mx-a">Go somewhere</a> --}}
            <br>
            <a href="{{ route('retailer.store.edit') }}" class="btn btn-block btn-dark text-uppercase my-2 mx-a">Update Store Page</a>
            <br>
            <a href="{{  route('retailer.products.front')}}" class="btn btn-block btn-dark text-uppercase my-2 mx-a"> My product</a>
        </div>
    </div>






    <p></p>


    </div>
    </div>















@endsection
