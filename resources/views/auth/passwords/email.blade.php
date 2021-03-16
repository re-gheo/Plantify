@extends('layouts.login-style')

@section('content')

    <div class="container">
        <div class="row px-2 pt-5">
            <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3 border-3 ">
                <h1 class="card-title text-center pb-3"><i class="fas fa-leaf text-success pr-2"></i>Planitfy</h1>
                    <h4 class="text-center"><strong>Forgot your password?</strong></h4>
                    <p class="text-center pt-1">Don't worry resetting your password is easy.
                        Just type in the email registered to Plantify.</p>
                    <div class="card-body">
        
                    <!--ALERT MESSAGE-->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                     @endif

                    <!--FORM-->
                     <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                <div class="pl-2 form-input ">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    
                                <button type="submit" class="btn btn-block btn-success text-uppercase my-2 mx-a">
                                    {{ __('Send Password Reset Link') }}
                                </button>

                                <div class="pt-2">
                                    <a href="{{ route('store') }}">Go back</a>
                                </div> 
                       
                    </form>
                    
                </div>
            </div>
        </div>
    </div>









@endsection
