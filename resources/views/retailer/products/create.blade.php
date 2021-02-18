@extends ('layouts/template')

@section ('content')


<form action="" method="POST">
@csrf

<label for=""></label>
<input type="text">

<label for=""></label>
<input type="text">

<label for=""></label>
<input type="text">

<label for=""></label>
<input type="text">

<label for=""></label>
<select name="" id="">
    @foreach($refs as $ref)
        <option value="{{ $ref->plant_referenceid  }}">{{ $ref->plant_scientificname }}</option>
    @endforeach
</select>

<label for=""></label>
<input type="text">

<label for=""></label>
<input type="text">


</form>

@endsection