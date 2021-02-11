@extends('layouts.login-style')

@section('content')


            <div class="container">
                <div  id="login-hero" class="row px-3">
                    <div  class="col-lg-10 col-xl-10 card flex-row mx-auto px-0 shadow p-0 rounded border-3">
                        <div class="img-left d-none d-md-flex"></div>   
                        <div class="login-card">
                         
                            
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                  <h4 class="text-center pb-1">Login to Plantify</h4>
                                    <div class="form-input ">
                                      
                                        <label for="email" class="">{{ __('E-Mail Address') }}</label>
            
                                        <div class="form-input">
                                            
                                            <input id="email" type="email" class=" @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        
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
                                            <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            
                                            @error('password')
                                                <span class="" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
            
                                    <div class="d-flex">
                                        <div class="">
                                            <div class="">
                                                <input class="" type="checkbox" name="remember_token" id="remember_token" {{ old('remember_token') ? 'checked' : '' }}>
            
                                                <label class="" for="remember_token">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                            <div class="">       
                                                @if (Route::has('password.request'))
                                                    <a class="" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="aux-container">
                                    
            
                                    </div>
            <br>
            
                                <!--All Bytons -->
                                    <div class="">
                                        <div class="">
                                            <button id="plantify-button" class="btn btn-block btn-success text-uppercase" type="submit" class="">
                                                {{ __('Login') }}
                                            </button>
                                            <a class="btn btn-block btn-social btn-google btn-danger text-uppercase font-weight-bold" href="{{url('/login/google')}}" class="">   <i class="fab fa-google"></i> Login with Google</a>


                                            <a class="btn btn-block btn-social btn-facebook btn-primary text-uppercase font-weight-bold my-2" href="{{url('/login/facebook')}}" class="">  <i class="fab fa-facebook-square"></i> Login with Facebook</a>
                                        </div>
                                    </div>
            
            
            
                            
                                </form>
                            </div>
                        </div>
                    </div>
                </div>      
                {{-- <div class="">{{ __('Login') }}</div> --}}

           
 
@endsection
