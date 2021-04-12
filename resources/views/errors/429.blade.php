@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message')
<a href="{{route('store')}}">RETURN TO HOME</a>
@endsection
