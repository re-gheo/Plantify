@extends('errors::minimal')

@section('title', __('Page Expired'))
@section('code', '419')
@section('message')
<a href="{{route('store')}}">RETURN TO HOME</a>
@endsection
