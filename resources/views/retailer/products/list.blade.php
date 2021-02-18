@extends ('layouts/template')

@section ('content')

        <div class="row">
          <div class="col-lg-10 mr-auto ml-auto">
              
              
              <div class="container">
                <h3 class="text-center">Plant Reference Table</h3>
              </div>
                <div class="div class= card-body table-responsive-sm">
              

  
    
                @foreach ($products as $product)

                <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                    <a href="">
                        <img src="{{ url('/storage/' . $store->store_backgroundimage) }}" alt="background">
                    </a>
                    
                   <b>{{ $product->product_name	}}</b> <br>
                   <b>{{ $product->product_price }} PHP</b>
                   
                </div>
               
                  
               @endforeach

            
                 </div>

            </div>
       
        </div>
	
</div>
<div> 
	</div>
    
</div>

@endsection