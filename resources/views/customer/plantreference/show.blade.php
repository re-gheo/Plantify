@extends('layouts.template')

@section('content')

    <br>
<div class="container card">
    <br>
    <div class="text-center">
        <h1><strong>{{ $plant_referencepage->plant_scientificname }}</strong></h1>
    </div>
    <hr>

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

    <div class="text-center">
        <label><b>How can you maintain the {{ $plant_referencepage->plant_scientificname }}?</b></label>
        <p class="text-left">{{ $plant_referencepage->plant_maintenance }}</p>
    </div>

    <br>

    <div class="text-center">
        <button class="btn btn-success btn-sm">
            <a class="text-white" href="{{ route('plant-information.index') }}">Return to References</a>
        </button>
    </div>

    <br>

</div>




@endsection
