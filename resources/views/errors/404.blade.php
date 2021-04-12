@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message')
<a href="{{route('store')}}">RETURN TO HOME</a>
@endsection
