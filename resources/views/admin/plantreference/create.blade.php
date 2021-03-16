@extends ('layouts/admin-template')

@section ('content')



        <div class="container">
            <div class="row px-2">
                    <div class="card-body text-center">
                        <h3>Create a Reference</h3>  
                </div>
                <div class="card-body">
                    
  <form action="{{ route('admin.reference.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="plant_scientificname"> Scientific name of the Plant </label>
        <div class="form-input">
            <input id="plant_scientificname" type="text" class=" @error('plant_scientificname') is-invalid @enderror" name="plant_scientificname" required autocomplete="plant_scientificname">

                @error('plant_scientificname')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
  
    <div>
        <label for="plant_description"> Description </label>
        <div>
            <textarea name="plant_description" id="plant_description" cols="100" rows="10" class="txtarea  @error('plant_description') is-invalid @enderror" name="plant_description" required autocomplete="plant_description" value="{{ old('plant_description') }}"></textarea>
                @error('plant_description')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>

    <div>
        <label for="plant_maintenance"> Maintenance Plan of the Plant</label>
        <div>
            <textarea name="plant_maintenance" id="plant_maintenance" cols="100" rows="10" class="txtarea @error('plant_maintenance') is-invalid @enderror" name="plant_maintenance" required autocomplete="	plant_maintenance" value="{{ old('plant_maintenance') }}"></textarea>
                @error('plant_maintenance')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    &nbsp;


    <div>
        <label for="plant_categoryid">Plant category</label>
        <select name="plant_categoryid" id="plant_categoryid">
            @foreach($categories as $category)
                <option value="{{ $category->product_categoryid  }}">{{ $category->categories }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="plant_photo">main photo for this plant</label>
            <div>
                <input type="file" name="plant_photo" id="plant_photo" required> 

                @error('plant_photo')
                <span class="" role="alert">
                    <strong> Please upload the main photo for this Plant</strong>
                </span>
            @enderror
            </div>
    </div>
    
    <div>
        <label for="plant_phototwo">2nd photo for this plant</label>
            <div>
                <input type="file" name="plant_phototwo" id="plant_phototwo" accept="image/x-png ,image/jpeg">
            </div>
    </div>
    <div>
        <label for="plant_photothree">3rd photo for this plant</label>
            <div>
                <input type="file" name="plant_photothree" id="plant_photothree" accept="image/x-png ,image/jpeg">
            </div>
    </div>
    
     <br>
        <div>
            <button class="btn btn-success text-uppercase my-2 mx-a text-white" type="submit"> create plant reference</button>
        </div>
</form>

                </div>
            </div>
        </div>











@endsection