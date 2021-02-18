@extends ('layouts/template')

@section ('content')

        <div class="row">
          <div class="col-lg-10 mr-auto ml-auto">
              
              
              <div class="container">
                <h3 class="text-center">Your Products</h3>
                <a href="/store/products/create"> Add a Products</a>
              </div>
                <div class="div class= card-body table-responsive-sm">
              

  
    list
                @foreach ($products as $product)

                <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                    <a href="">
                        <img src="{{ url('/storage/' . $product->product_mainphoto) }}" alt="background">
                    </a>
                    
                   <b>{{ $product->product_name	}}</b> <br>
                   <b>{{ $product->product_price }} PHP</b><br>
                   <b>{{ $product->product_quantity }} PHP</b>
                   
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