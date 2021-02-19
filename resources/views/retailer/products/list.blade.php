@extends ('layouts/template')

@section ('content')

        <div class="row">
          <div class="col-lg-10 mr-auto ml-auto">
              
              
              <div class="container">
                <h3 class="text-center">My Products</h3>
                <a href="/store/products/create"> Add a Products</a>
              </div>
                <div class="div class= card-body table-responsive-sm">
              

  
                  
                @foreach ($products as $product)

                <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                    <a href="/store/products/{{$product->product_id}}">
                        <img src="{{ url('/storage/' . $product->product_mainphoto) }}"  height="490" alt="background">
                   <br>
                    
                   <h4>{{ $product->product_name	}}</h4> <br>
                   <b>{{ $product->product_price }} PHP</b><br>
                   <b>Stocks ({{ $product->product_quantity }} X)  </b>
                  </a>
                   
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