@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', 'FORBIDDEN')
@section('message')
<a href="{{route('store')}}">RETURN TO HOME</a> <br/>
<small>{{$exception->getMessage()}}</small>
@endsection
