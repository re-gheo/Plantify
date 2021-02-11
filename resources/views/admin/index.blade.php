@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in admin!') }}

                </div>

                <div class="form-control">
                    <a href="/admin/plantreference/" class="btn btn-dark"> Back to Reference list</a>
                    <a href="/admin/account-management" class="btn btn-dark"> Check user accounts</a>
                    <a href="/admin/categories" class="btn btn-dark"> go to category</a>
                </div>
                </div>
             
        </div>
    </div>
</div>
@endsection
