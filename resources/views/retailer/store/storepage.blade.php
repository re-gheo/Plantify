@extends ('layouts/template')

@section ('content')



<h1><b>Your Store information</b>  </h1>


<div>  
    <img src="{{url('/storage/'.$store->store_backgroundimage) }}" alt="background"> 
</div>


<div>   
    <img src="{{url('/storage/'.$store->store_profileimage) }}" alt="profile"> 
</div>


            <p>{{ $store->store_name }}</p>

            
        </div>
    </div>




    <div>
        <label for=""><b>STORE DESCRIPTION</b></label>
        <div>
            
          
            <p>{{ $store->store_description }}</p>
           
        </div>

    <a href="/settings/store/customize" class="btn btn-success"> Update store page</a>

    <a href="/store/product"> product</a>
    </div>













@endsection