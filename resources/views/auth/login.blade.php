@extends('layouts.login-style')

@section('content')


    <div class="container">
        <div id="login-hero" class="row">
            <div class="col-lg-10 col-xl-10 card flex-row mx-auto px-0 shadow ">
                <div class="img-left d-none d-md-flex">
                    <img class="img-left" src="{{ asset('/css/plantify.png') }}" alt="">
                </div>
                <div class="login-card">

                    <form class="p-3 pl-5 pr-5  " method="POST" action="{{ route('login') }}">
                        @csrf


                        <h4 class="text-center pb-1">Login to Plantify</h4>
                        <div class="form-input ">

                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <div class="form-input">

                                <input id="email" type="email" @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <br>
                                @error('email')
                                    <span class="error-message pt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-input">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="form-input">
                                <input class="" id="password" type="password"
                                    class=" @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                                <br>
                                @error('password')
                                    <span class="error-message pt-2" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex">
                            <div class="">
                                <div class="">
                                    <input class="" type="checkbox" name="remember_token" id="remember_token"
                                        {{ old('remember_token') ? 'checked' : '' }}>

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
                                <button id="plantify-button" class="btn btn-block btn-success text-uppercase" type="submit"
                                    class="">
                                    {{ __('Login') }}
                                </button>
                                <a class="btn btn-block btn-social btn-google btn-danger text-uppercase font-weight-bold"
                                    href="{{ route('login.google') }}" class=""> <i class="fab fa-google"></i> Login with
                                    Google</a>


                                <a class="btn btn-block btn-social btn-facebook btn-primary text-uppercase font-weight-bold my-2"
                                    href="{{ route('login.facebook') }}" class=""> <i class="fab fa-facebook-square"></i>
                                    Login with Facebook</a>
                            </div>

                            <div class="text-center">
                                don't have an account? <a href="{{ route('registerf') }}">Register here</a>
                            </div>
                        </div>




                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection
