@extends('layouts.template')

@section('content')
    {{ dump($plant_referencepage) }}

    <h1>
        SHOW
    </h1>

<<<<<<< HEAD
    <div class="text-center card">
        Image supposed to appear here..
        <img src="{{asset('/storage/'. $plant_referencepage->plant_photo)  }}" width="300" height="300" alt="main">
        <img src="{{ asset('/storage/'.$plant_referencepage->plant_phototwo) }}" width="300" height="300" alt="main">
        <img src="{{ asset('/storage/'.$plant_referencepage->plant_photothree) }}" width="300" height="300" alt="main">
    </div>

    <br>

    <div class="text-center">
        <label><b>What is the {{ $plant_referencepage->plant_scientificname }}?</b></label>
        <p class="text-left">{{ $plant_referencepage->plant_description }}</p>
=======
    <div>
        image HERE
        <img src="{{ $plant_referencepage->plant_photo }}" alt="">
        <img src="{{ $plant_referencepage->plant_phototwo }}" alt="">
        <img src="{{ $plant_referencepage->plant_photothree }}" alt="">
    </div>
    <div>
        <label>plant_scientificname</label>
        <p>{{ $plant_referencepage->plant_scientificname }}</p>
    </div>
>>>>>>> parent of 3bf9cba (Designed Specific Plants Reference Page & Specific Products Page)

    <div>
        <label>plant_description</label>
        <p>{{ $plant_referencepage->plant_description }}</p>
    </div>

<<<<<<< HEAD
    <br>

    <div class="text-center">
        <button class="btn btn-success btn-sm">
            <a class="text-white" href="{{ route('plant-information.index') }}">Return to References</a>
        </button>
=======
    <div>
        <label>plant_maintenance</label>
        <p>{{ $plant_referencepage->plant_maintenance }}</p>
>>>>>>> parent of 3bf9cba (Designed Specific Plants Reference Page & Specific Products Page)
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
