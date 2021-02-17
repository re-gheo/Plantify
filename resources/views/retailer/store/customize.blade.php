@extends ('layouts/template')

@section ('content')
<form method="POST" action="/settings/store/setup" >
    @csrf
    @method('PUT')
<div class="container">
    <div class="row px-2 pt-5">
        <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
            <div class="card-body mx-auto  ">
                <h3 class="card-title text-center pb-3">{{ $store->store_name }}</h3>
               

                   
                    <h3><b>Your Store profile</b>  </h3>
                    

<div>  
    <img src="{{url('/storage/'.$store->store_backgroundimage) }}" alt="background"> 
</div>

<div>
    <label for="store_backgroundimage">main photo for this plant</label>
        <div>
            <input type="file" name="store_backgroundimage" id="store_backgroundimage" required> 

            @error('store_backgroundimage')
            <span class="" role="alert">
                <strong> Please upload the main photo for this Plant</strong>
            </span>
        @enderror
        </div>
</div>
<div>   
    <img src="{{url('/storage/'.$store->store_profileimage) }}" alt="profile"> 
</div>
<div>
    <label for="store_profileimage">main photo for this plant</label>
        <div>
            <input type="file" name="store_profileimage" id="store_profileimage" required> 

            @error('store_profileimage')
            <span class="" role="alert">
                <strong> Please upload the main photo for this Plant</strong>
            </span>
        @enderror
        </div>
</div>





           

            
        </div>
    </div>




    
                            <div>
                    
                        <label for="store_description" ><h5><b>Your Store Description</b> </h3></label>

                        
                           <div class="form-input">
                            
                            <textarea id="store_description" type="text" class=" @error('store_description') is-invalid @enderror" name="store_description" value="{{ old('store_description') }}" 
                            required autocomplete="store_description" autofocus cols="60" rows="10"></textarea>
                            @error('store_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           </div>
                            </div>
                    
                          

                         

                   

                                          
              
            </div>
            
        </div>
    
        <div class="container">
            <div class="row px-2 pt-5">
                <div class="col-lg-8 col-xl-12 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                    <label for="cod_option">Cash on delivery option</label><br/>
                    <label class="radio-inline"><input type="radio" name="cod_option" id="cod_option" value="1" {{ (old('cod_option') == 'yes') ? 'checked' : ''}}>Yes</label>
                    <label class="radio-inline"><input type="radio" name="cod_option" id="cod_option" value="0" {{ (old('cod_option') == 'no') ? 'checked' : ''}}> No</label>
                </div>
            </div>
        </div>

        <button class="btn btn-success text-uppercase my-2 mx-a" type="submit">UPDATE STORE PAGE    </button>
    </form>
@endsection