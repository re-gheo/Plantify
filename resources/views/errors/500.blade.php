@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message')
<a href="{{route('store')}}">RETURN TO HOME</a>
@endsection
