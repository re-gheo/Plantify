@extends('layouts.template')

@section('content')
    {{-- {{ dump($plant_referencepage) }} --}}

    <h1>
        SHOW
    </h1>

    <div>
        image HERE
        <img src="{{asset('/storage/'. $plant_referencepage->plant_photo)  }}" width="300" height="300" alt="main">
        <img src="{{ asset('/storage/'.$plant_referencepage->plant_phototwo) }}" width="300" height="300" alt="main">
        <img src="{{ asset('/storage/'.$plant_referencepage->plant_photothree) }}" width="300" height="300" alt="main">
        Image uphere
    </div>
    <div>
        <label>plant_scientificname</label>
        <p><b>{{ $plant_referencepage->plant_scientificname }}</b></p>
    </div>

    <div>
        <label>plant_description</label><br>
        <textarea>{{ $plant_referencepage->plant_description }}</textarea>
    </div>

    <div>
        <label>plant_maintenance</label><br>
        <textarea>{{ $plant_referencepage->plant_maintenance }}</textarea>
    </div>

    <div>
        <label></label>
        <p></p>
    </div>

    <div>
        <label></label>
        <p></p>
    </div>




@endsection
