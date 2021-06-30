@extends('layouts.template')

@section('content')


    <h1>
        All PLANTS REFERENCE
    </h1>
    @foreach ($plant_referencepages as $key => $ref)



        <div>
            {{ $ref->plant_photo }}
            <a href="{{ route('plant-information.show', [$ref->plant_referenceid]) }}">PLANT NAME
                {{ $ref->plant_scientificname }}</a>
        </div>
        <br>



    @endforeach
    </table>




@endsection
