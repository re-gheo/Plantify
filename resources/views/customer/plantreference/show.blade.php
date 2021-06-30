@extends('layouts.template')

@section('content')
    {{ dump($plant_referencepage) }}

    <h1>
        SHOW
    </h1>

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

    <div>
        <label>plant_description</label>
        <p>{{ $plant_referencepage->plant_description }}</p>
    </div>

    <div>
        <label>plant_maintenance</label>
        <p>{{ $plant_referencepage->plant_maintenance }}</p>
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
