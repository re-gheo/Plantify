@extends ('layouts/app')

@section ('content')

<a href="/admin/plantreference/" class="btn btn-dark"> Back to Reference list</a>

<div class = "card-body">

  <form action="/admin/plantreference/store" method="POST" enctype="multipart/form-data">
    @csrf
<h2>create a plant reference page</h2>
    <div>
        <label for="retailer_address">Retailers Full address for pickup</label>
        <div>
            <input id="retailer_address" type="text" class=" @error('retailer_address') is-invalid @enderror" name="retailer_address" required autocomplete="retailer_address">

                @error('retailer_address')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
  
    <div>
        <label for="retailer_postalcode">Retailers Postal Code</label>
        <div>
            <input id="retailer_postalcode" type="text" class=" @error('retailer_postalcode') is-invalid @enderror" name="retailer_postalcode" required autocomplete="retailer_postalcode">

                @error('retailer_postalcode')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>

    <div>
        <label for="retailer_personincharge">Person Incharge/Owner of this store</label>
        <div>
            <input id="retailer_personincharge" type="text" class=" @error('retailer_personincharge') is-invalid @enderror" name="retailer_personincharge" required autocomplete="	retailer_personincharge">

                @error('retailer_personincharge')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>

  
  
   
    
    <div>
        <label for="retailer_officialidfront">an Official ID card picture of the card [Front Scan]</label>
            <div>
                <input type="file" name="retailer_officialidfront" id="retailer_officialidfront" accept="image/x-png ,image/jpeg">
            </div>
    </div>
     
    <div>
        <label for="retailer_officialidback">an Official ID card picture of the card [Back Scan]</label>
            <div>
                <input type="file" name="retailer_officialidback" id="retailer_officialidback" accept="image/x-png ,image/jpeg">
            </div>
    </div>

    <div>
        <label for="retailer_idnumber">Full ID number of the submitted ID</label>
        <div>
            <input id="retailer_idnumber" type="text" class=" @error('retailer_idnumber') is-invalid @enderror" name="retailer_idnumber" required autocomplete="retailer_idnumber">

                @error('retailer_idnumber')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    
    {{-- <div class="form-input">
        <label for="birthday" >Birthday</label>

        <div >
            <input type="date" id="birthday" name="birthday">
        </div>
    </div> --}}

    {{-- <div>
        <label for="retailer_city">City</label>
        <div>
            <input id="retailer_city" type="text" class=" @error('retailer_city') is-invalid @enderror" name="retailer_city" required autocomplete="retailer_city">

                @error('retailer_city')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div> --}}


    <div>
        <label for="retailer_region">Region</label>
        <div>
            <input id="retailer_region" type="text" class=" @error('retailer_region') is-invalid @enderror" name="retailer_region" required readonly value="NCR" autocomplete="retailer_region">

                @error('retailer_region')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>


    <div>
        <label for="retailer_city">City location of your Business: only supports NCR areas only. </label>
        
        <div>
            <select id="retailer_city" required name="retailer_city">
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="opel">Opel</option>
                <option value="audi">Audi</option>
              </select>

               
        </div>
    </div>

    

   
  
     <br>
        <div>
            <button type="submit"> Apply for Retailer</button>
        </div>
</form>


</div>

@endsection