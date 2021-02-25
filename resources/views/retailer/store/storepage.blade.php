@extends ('layouts/template')

@section ('content')



<h1><b>Your Store Information</b>  </h1>


<div>  
    <img src="{{url('/storage/'.$store->store_backgroundimage) }}" height="500" width="500" alt="background"> 
</div>


<div>   
    <img src="{{url('/storage/'.$store->store_profileimage) }}" height="100" width="100" alt="profile"> 
</div>


            <p>{{ $store->store_name }}</p>

            
        </div>
    </div>




    <div>
        <label for=""><b>STORE DESCRIPTION</b></label>
        <div>
            
          
            <p>{{ $store->store_description }}</p>
           
        </div>

    <a href="/store/customize" class="btn btn-success">Update Store Page</a>


    <a href="/store/products"class="btn btn-success">  My product</a>

    </div>













@endsection