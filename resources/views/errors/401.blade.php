@extends('errors::minimal')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message')
<a href="{{route('store')}}">RETURN TO HOME</a>
@endsection
