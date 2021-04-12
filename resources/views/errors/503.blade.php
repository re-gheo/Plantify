@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message')
<a href="{{route('store')}}">RETURN TO HOME</a>
@endsection
