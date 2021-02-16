@extends('layouts.login-style')

@section('content')

<style>
    /* body{
    background-color: #3bb78f;
    background-image: linear-gradient(315deg, #3bb78f 0%, #0bab64 74%);
    } */
  

</style>

                {{-- <div class="">{{ __('Register') }}</div> --}}
                &nbsp;
                <div class="container">
                    <div id="#register-hero"class="row px-2">
                        <div class="col-lg-8 col-xl-6 card flex-row mx-auto px-4 shadow p-3 mb-5 border-3">
                            <div class="register-card mx-auto ">
                                <form method="POST" class="form-box px-2" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-input ">
                                        <label for="first_name" class="">{{ __('First name') }}</label>
                                        <div class="">
                                            <input id="first_name" type="text" pattern="[^()/><\][\\\x22,;|]+" class=" @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autofocus>
            
                                            @error('first_name')
                                                <span  role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-input">
                                        <label for="last_name" class="">{{ __('Last name') }}</label>
            
                                        <div class="">
                                            <input id="last_name" type="text" pattern="[^()/><\][\\\x22,;|]+" class=" @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
            
                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-input">
                                        <label for="email" class="">{{ __('E-Mail Address') }}</label>
            
                                        <div class="">
                                            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                                            @error('email')
                                                <span class="" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-input">
                                        <label for="password" class="">{{ __('Password') }}</label>
            
                                        <div class="">
                                            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                            @error('password')
                                                <span class="" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="form-input">
                                        <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
            
                                        <div class="">
                                            <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
            
                                    <div class="">
                                        <div class="">
                                            <button id="plantify-button" type="submit" class="btn btn-block btn-success text-uppercase my-2 mx-a">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                       
                                            <a class="btn btn-block btn-social btn-google btn-danger text-uppercase font-weight-bold" href="{{url('/login/google')}}" class="">   <i class="fab fa-google"></i> Login with Google</a>
                                    
                                            <a class="btn btn-block btn-social btn-facebook btn-primary text-uppercase font-weight-bold my-2" href="{{url('/login/facebook')}}" class="">  <i class="fab fa-facebook-square"></i> Login with Facebook</a>
                                  
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
@endsection
