@extends ('layouts/app')

@section ('content')

<a href="/admin/plantreference/" class="btn btn-dark"> Back to Reference list</a>

<div class = "card-body">

  <form action="/admin/plantreference/{{ $reference->plant_referenceid }}/edit" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
<h2>create a plant reference page</h2>
    <div>
        <label for="plant_scientificname"> Scientific name of the Plant </label>
        <div>
            <input id="plant_scientificname" type="text" class=" @error('plant_scientificname') is-invalid @enderror" 
            value="{{ $reference->plant_scientificname }}" name="plant_scientificname" required autocomplete="plant_scientificname" >

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
            <textarea name="plant_description" id="plant_description" cols="100" rows="10" class=" @error('plant_description') is-invalid @enderror"  
            name="plant_description" required autocomplete="plant_description" value="{{ old('plant_description') }}">{{ $reference->plant_description }}</textarea>
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
            <textarea name="plant_maintenance" id="plant_maintenance" cols="100" rows="10" class=" @error('plant_maintenance') is-invalid @enderror"  
            name="plant_maintenance" required autocomplete="	plant_maintenance" value="{{ old('plant_maintenance') }}">{{ $reference->plant_maintenance }}</textarea>
                @error('plant_maintenance')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    <div>
        <label for="plant_categoryid">Plant category</label>
        <select name="plant_categoryid" id="plant_categoryid">
            <option value="{{ $reference->plant_categoryid  }}" selected disabled hidden></option>
            @foreach($categories as $category)
                <option value="{{ $category->product_categoryid  }}">{{ $category->categories }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="plant_photo">main photo for this plant</label>
        <div>
            <img src="{{url('/storage/'. $reference->plant_photo)  }}" width="300" height="300" alt="main">
        </div>
            <div>
                <input type="file" name="plant_photo" id="plant_photo" > 

                @error('plant_photo')
                <span class="" role="alert">
                    <strong> Please upload the main photo for this Plant</strong>
                </span>
            @enderror
            </div>
    </div>
    
    <div>
        <label for="plant_phototwo">2nd photo for this plant</label>
        @if(isset($reference->plant_phototwo))
            <div>
                <img src="{{url('/storage/'. $reference->plant_phototwo)  }}" width="300" height="300" alt="2nd">
                <a href="/admin/plantreference/{{ $reference->plant_referenceid }}/removepic/two" class="btn btn-dark"> remove picture</a>
            </div>
            @endif
            <div>
                <input type="file" name="plant_phototwo" id="plant_phototwo">
            </div>
           
           
    </div>
        
    <div>
        <label for="plant_photothree">3rd photo for this plant</label>
        @if(isset($reference->plant_photothree))
        <div>
            <img src="{{url('/storage/'. $reference->plant_photothree)  }}" width="300" height="300" alt="3rd">
            <a href="/admin/plantreference/{{ $reference->plant_referenceid }}/removepic/three" class="btn btn-dark">remove picture</a>
        </div>
        @endif
            <div>
                <input type="file" name="plant_photothree" id="plant_photothree">
            </div>
           
           
    </div>
    
     <br>
        <div>
            <button type="submit" class="btn btn-dark"> Edit plant reference</button>
        </div>
</form>


</div>

@endsection