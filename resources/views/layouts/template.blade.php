<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Plantify | Official</title>
    <link rel="icon" href="{{ asset('icon.ico') }}" />

    <!--CSS Preamble-->
    <link rel="stylesheet" type="text/css" href="/CSS/main.css'">
    <link rel="stylesheet" type="text/css" href="{{ asset('/CSS/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{!! secure_asset('/css/main.css') !!}">
    <link rel="stylesheet" href="/CSS/plantify_theme.css">
    <link rel="stylesheet" href="{{ asset('/CSS/plantify_theme.css') }}">
    <link rel="stylesheet" href="{!! secure_asset('/css/plantify_theme.css') !!}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://kit.fontawesome.com/7026e01adc.js" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>


    @yield('styles')
</head>

<body>

    <!--Navbar-->
    <nav id="plantify-navbar" class="navbar navbar-expand-lg  ">
        <div class="px-3  "> <a class="navbar-brand  " href="{{ route('store') }}"><i
                    class="fas fa-leaf small mr-2 "></i>Plantify</a>
        </div>
        <button class="navbar-toggler " id="toggler" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i id="bars" class="fas fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ml-2">

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('store.articles') }}">Articles <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('plant-information.index') }}">Plant References <span
                            class="sr-only">(current)</span></a>
                </li>

                @if (!Auth::user())
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.cart.show') }}">My Cart</a>
                    </li>

                @endif

                <div class="div">
                    <li class="nav-item">
                        <form class=" form-inline my-2 my-lg-0 d-flex flex-row-reverse ">
                            <ul class="navbar-nav">

                                @if (!Auth::user())
                                    {{-- login button --}}
                                    <a id="cta" class="nav-item" data-toggle="modal" data-target="#loginpage"
                                        href="{{ route('loginf') }}">Login/Sign up</a>
                                    {{-- Register button --}}
                                    {{-- <a id="cta" class="nav-item" data-toggle="modal" data-target="#registerpage"
                                    href="{{ route('loginf') }}">Logina</a>  --}}
                                @endif
                            </ul>
                        </form>
                    </li>
                </div>

                <li class="nav-item dropdown">

                    @if (!Auth::user())

                    @else

                        <img class="avatar-customer ml-2" src="{{ Auth::user()->profile_picture }}"
                            alt="{{ Auth::user()->name }}">



                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('client.order.list') }}">My Orders</a>


                            <a class="dropdown-item" href="{{ route('customer.profile.show') }}">User
                                Settings</a>

                            @if (Auth::user()->user_role == 'admin')
                                <a class="dropdown-item" href="{{ route('admin.home') }}">Admin Controls</a>


                            @elseif(Auth::user()->user_role == 'retailer')
                                <a class="dropdown-item" href="{{ route('retailer.store.front') }}">Store
                                    Page</a>
                                <a class="dropdown-item" href="{{ route('subscriptions.create') }}">Subscription</a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item">
                                    Logout
                                </button>
                            </form>
                    @endif

                        </li>            
        </div>

        <div class="d-flex flex-row-reverse ">
            <div class="nav-search pr-2 pull-right">
                <form action="{{ route('products.search') }}" class="" method="GET" role="search">
                    @csrf
                    <select class="plantify-select name mr-2" "type" id="">
                        <option value="0">All</option>
                        <option value="1">Plant Products</option>
                        <option value="2">Other Products</option>
                    </select>
                    <input id="search" type="text" class="pl-2 p-1" name="query" placeholder="Search here"
                        aria-label="search-bar" aria-describedby="basic-addon2">

                    <button class="search-button btn btn-outline-success text-white"><i
                            class="fas fa-search"></i></button></button>

                </form>
            </div>
        </div>
        </li>
        


       


        &nbsp;

        {{-- Login Page Content --}}
        <div class="modal fade" id="loginpage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    {{-- EMAIL --}}
                    <div class="modal-body">
                        <div class="form-title text-center">
                            <h4 class="">Login</h4>
                        </div>
                        <div class="d-flex flex-column text-center">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                <div class="form-group form-input">
                                    <input id="email" type="email" @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autofocus>
                                    @error('email')
                                        <span class="error-message pt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- PASSWORD --}}
                                <div class="form-group form-input">
                                    <label for="password" class="">{{ __('Password') }}</label>
                                    <input class="" id="password" type="password"
                                        class=" @error('password') is-invalid @enderror" name="password" required>
                                    @error('password')
                                        <span class="error-message pt-2" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-center">
                                    @include('auth.recaptcha')

                                </div>



                                {{-- REMEMBER ME --}}

                                <div class="d-flex justify-content-center ">
                                    <div class="text-center align-items-center mr-2">
                                        <input class="" type="checkbox" name="remember_token" id="remember_token"
                                            {{ old('remember_token') ? 'checked' : '' }}>

                                        <label class="" for="remember_token">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                    {{-- FORGOT PASSWORD --}}
                                    <div class="text-center align-items-center">
                                        @if (Route::has('password.request'))
                                            <a class="" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <br>

                                {{-- LOGIN BUTTON --}}

                                <button id="plantify-button" class="btn btn-block btn-success text-uppercase"
                                    type="submit" class="">
                                    {{ __('Login') }}
                                </button>
                            </form>

                            <div class="text-center text-muted delimiter">or use a social network</div>
                            <div class="d-flex justify-content-center social-buttons">
                                <button type="button" class="btn btn-danger btn-round mr-2" data-toggle="tooltip"
                                    data-placement="top" title="google">
                                    <a class="text-white" href="{{ route('login.google') }}"><i
                                            class="fab fa-google"></i></a>
                                    {{-- <i class="fab fa-twitter"></i> --}}
                                </button>
                                <button type="button" class="btn btn-primary btn-round mr-2" data-toggle="tooltip"
                                    data-placement="top" title="Facebook">
                                    <a class="text-white" href="" {{ route('login.facebook') }}"><i
                                            class="fab fa-facebook-square"></i></a>
                                </button>
                                </di>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <div class="signup-section">Not a member yet?
                            <a class="text-primary" id="cta" data-toggle="modal" data-target="#registerpage"
                                href="{{ route('registerf') }}">
                                Register Here
                            </a>
                        </div>
                    </div>
                </div>
            </div>

              {{-- REGISTER Page Content --}}
              <div class="modal fade" id="registerpage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                          <div class="modal-header border-bottom-0">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
  
                          {{-- FIRST NAME --}}
                          <div class="modal-body">
                              <div class="form-title text-center">
                                  <h4 class="">Register Account</h4>
                              </div>
                              <div class="d-flex flex-column text-center">
                                  <form method="POST" action="{{ route('register') }}">
                                      @csrf
                                      <div class="form-group form-input ">
                                          <label for="first_name" class="">{{ __('First name') }}</label>
                                          <div class="">
                                              <input id="first_name" type="text" pattern="[^()/><\][\\\x22,;|]+"
                                                  class=" @error('first_name') is-invalid @enderror" name="first_name"
                                                  value="{{ old('first_name') }}" autofocus>
  
                                              @error('first_name')
                                                  <span class="error-message pt-2" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>
                                      </div>
  
                                      {{-- LAST NAME --}}
                                      <div class="form-group form-input">
                                          <label for="last_name" class="">{{ __('Last name') }}</label>
  
                                          <div class="">
                                              <input id="last_name" type="text" pattern="[^()/><\][\\\x22,;|]+"
                                                  class=" @error('last_name') is-invalid @enderror" name="last_name"
                                                  value="{{ old('last_name') }}" required autofocus>
  
                                              @error('last_name')
                                                  <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>
                                      </div>
  
                                      {{-- EMAIL --}}
                                      <div class="form-group form-input">
                                          <label for="email" class="">{{ __('E-Mail Address') }}</label>
  
                                          <div class="">
                                              <input id="email" type="email" class=" @error('email') is-invalid @enderror"
                                                  name="email" value="{{ old('email') }}" required>
  
                                              @error('email')
                                                  <span class="error-message pt-2" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>
                                      </div>
  
                                      {{-- REMEMBER ME --}}
  
  
                                      <div class="form-group form-input">
                                          <label for="password" class="">{{ __('Password') }}</label>
  
                                          <div class="">
                                              <input id="password" type="password"
                                                  class=" @error('password') is-invalid @enderror" name="password"
                                                  required>
  
                                              @error('password')
                                                  <span class="error-message pt-2" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                  </span>
                                              @enderror
                                          </div>
                                      </div>
  
                                      <div class="form-input">
                                          <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
  
                                          <div class="">
                                              <input id="password-confirm" type="password" class=""
                                                  name="password_confirmation" required>
                                          </div>
                                      </div>
  
                                      <br>
  
                                  
  
                                      <div class="">
                                          <button id="plantify-button" type="submit"
                                              class="btn btn-block btn-success text-uppercase my-2 mx-a">
                                              {{ __('Register') }}
                                          </button>
                                      </div>
                                  </form>
                                  <div class="text-center mt-2">
                                    <span class="mb-"> 
                                        <input required type="checkbox" data-toggle="modal" data-target="#exampleModal"
                                            class="">
                                        By checking, you agree to
                                       <a href="{{ route('terms.index') }}">Plantify's terms and conditions</a> 
                                    </span>
                                </div>
                                  <div class="text-center text-muted delimiter mt-2">or use a social network</div>
                                  <div class="d-flex justify-content-center social-buttons">
                                      <button type="button" class="btn btn-danger btn-round mr-2" data-toggle="tooltip"
                                          data-placement="top" title="google">
                                          <a class="text-white" href="{{ route('login.google') }}"><i
                                                  class="fab fa-google"></i></a>
                                          {{-- <i class="fab fa-twitter"></i> --}}
                                      </button>
                                      <button type="button" class="btn btn-primary btn-round mr-2" data-toggle="tooltip"
                                          data-placement="top" title="Facebook">
                                          <a class="text-white" href="" {{ route('login.facebook') }}"><i
                                                  class="fab fa-facebook-square"></i></a>
                                      </button>
                                      </di>
                                  </div>
                              </div>
                          </div>
                  
                  
                      </div>
                  </div>
              </div>
           
              

            <div class="d-flex flex-row-reverse">

                @if (!Auth::user())
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.cart.show') }}">My Cart</a>
                    </li>

                @endif
                <li class="nav-item dropdown">

                    @if (!Auth::user())

                    @else

                        <img class="avatar-customer ml-2" src="{{ Auth::user()->profile_picture }}"
                            alt="{{ Auth::user()->name }}">



                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('client.order.list') }}">My Orders</a>


                            <a class="dropdown-item" href="{{ route('customer.profile.show') }}">User
                                Settings</a>

                            @if (Auth::user()->user_role == 'admin')
                                <a class="dropdown-item" href="{{ route('admin.home') }}">Admin Controls</a>


                            @elseif(Auth::user()->user_role == 'retailer')
                                <a class="dropdown-item" href="{{ route('retailer.store.front') }}">Store
                                    Page</a>
                                <a class="dropdown-item" href="{{ url('subscription') }}">Subscription</a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item">
                                    Logout
                                </button>
                            </form>
                    @endif
                    {{-- End of Login Page Content --}}
            </div>


            </li>


            <div class="d-flex flex-row-reverse">

                @if (!Auth::user())
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.cart.show') }}">My Cart</a>
                    </li>

                @endif
                <li class="nav-item dropdown">

                    @if (!Auth::user())

                    @else

                        <img class="avatar-customer ml-2" src="{{ Auth::user()->profile_picture }}"
                            alt="{{ Auth::user()->name }}">



                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('client.order.list') }}">My Orders</a>


                            <a class="dropdown-item" href="{{ route('customer.profile.show') }}">User
                                Settings</a>

                            @if (Auth::user()->user_role == 'admin')
                                <a class="dropdown-item" href="{{ route('admin.home') }}">Admin Controls</a>


                            @elseif(Auth::user()->user_role == 'retailer')
                                <a class="dropdown-item" href="{{ route('retailer.store.front') }}">Store
                                    Page</a>
                                <a class="dropdown-item" href="{{ url('subscription') }}">Subscription</a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item">
                                    Logout
                                </button>
                            </form>
                    @endif

            </div>


            {{-- Login Page Content --}}
            <div class="modal fade" id="loginpage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{-- EMAIL --}}
                        <div class="modal-body">
                            <div class="form-title text-center">
                                <h4 class="">Login</h4>
                            </div>
                            <div class="d-flex flex-column text-center">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <label for="email" class="">{{ __('E-Mail Address') }}</label>
                                    <div class="form-group form-input">
                                        <input id="email" type="email" @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autofocus>
                                        @error('email')
                                            <span class="error-message pt-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- PASSWORD --}}
                                    <div class="form-group form-input">
                                        <label for="password" class="">{{ __('Password') }}</label>
                                        <input class="" id="password" type="password"
                                            class=" @error('password') is-invalid @enderror" name="password" required>
                                        @error('password')
                                            <span class="error-message pt-2" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        @include('auth.recaptcha')

                                    </div>



                                    {{-- REMEMBER ME --}}

                                    <div class="d-flex justify-content-center ">
                                        <div class="text-center align-items-center mr-2">
                                            <input class="" type="checkbox" name="remember_token" id="remember_token"
                                                {{ old('remember_token') ? 'checked' : '' }}>

                                            <label class="" for="remember_token">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                        {{-- FORGOT PASSWORD --}}
                                        <div class="text-center align-items-center">
                                            @if (Route::has('password.request'))
                                                <a class="" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>

                                    <br>

                                    {{-- LOGIN BUTTON --}}

                                    <button id="plantify-button" class="btn btn-block btn-success text-uppercase"
                                        type="submit" class="">
                                        {{ __('Login') }}
                                    </button>
                                </form>

                                <div class="text-center text-muted delimiter">or use a social network</div>
                                <div class="d-flex justify-content-center social-buttons">
                                    <button type="button" class="btn btn-danger btn-round mr-2" data-toggle="tooltip"
                                        data-placement="top" title="google">
                                        <a class="text-white" href="{{ route('login.google') }}"><i
                                                class="fab fa-google"></i></a>
                                        {{-- <i class="fab fa-twitter"></i> --}}
                                    </button>
                                    <button type="button" class="btn btn-primary btn-round mr-2" data-toggle="tooltip"
                                        data-placement="top" title="Facebook">
                                        <a class="text-white" href="" {{ route('login.facebook') }}"><i
                                                class="fab fa-facebook-square"></i></a>
                                    </button>
                                    </di>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <div class="signup-section">Not a member yet?
                                <a class="text-primary" id="cta" data-toggle="modal" data-target="#registerpage"
                                    href="{{ route('registerf') }}">
                                    Register Here
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-row-reverse">

                </div>
                @if (!Auth::user())
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customer.cart.show') }}">My Cart</a>
                    </li>

                @endif
                <li class="nav-item dropdown">

                    @if (!Auth::user())

                    @else

                        <img class="avatar-customer ml-2" src="{{ Auth::user()->profile_picture }}"
                            alt="{{ Auth::user()->name }}">



                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('client.order.list') }}">My Orders</a>


                            <a class="dropdown-item" href="{{ route('customer.profile.show') }}">User
                                Settings</a>

                            @if (Auth::user()->user_role == 'admin')
                                <a class="dropdown-item" href="{{ route('admin.home') }}">Admin Controls</a>


                            @elseif(Auth::user()->user_role == 'retailer')
                                <a class="dropdown-item" href="{{ route('retailer.store.front') }}">Store
                                    Page</a>
                                <a class="dropdown-item" href="{{ url('subscription') }}">Subscription</a>
                            @endif

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item">
                                    Logout
                                </button>
                            </form>
                    @endif

            </div>


            </li>

            {{-- Login Page Content --}}
            <div class="modal fade" id="registerpage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{-- FIRST NAME --}}
                        <div class="modal-body">
                            <div class="form-title text-center">
                                <h4 class="">Register Account</h4>
                            </div>
                            <div class="d-flex flex-column text-center">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group form-input ">
                                        <label for="first_name" class="">{{ __('First name') }}</label>
                                        <div class="">
                                            <input id="first_name" type="text" pattern="[^()/><\][\\\x22,;|]+"
                                                class=" @error('first_name') is-invalid @enderror" name="first_name"
                                                value="{{ old('first_name') }}" autofocus>

                                            @error('first_name')
                                                <span class="error-message pt-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- LAST NAME --}}
                                    <div class="form-group form-input">
                                        <label for="last_name" class="">{{ __('Last name') }}</label>

                                        <div class="">
                                            <input id="last_name" type="text" pattern="[^()/><\][\\\x22,;|]+"
                                                class=" @error('last_name') is-invalid @enderror" name="last_name"
                                                value="{{ old('last_name') }}" required autofocus>

                                            @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- EMAIL --}}
                                    <div class="form-group form-input">
                                        <label for="email" class="">{{ __('E-Mail Address') }}</label>

                                        <div class="">
                                            <input id="email" type="email" class=" @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required>

                                            @error('email')
                                                <span class="error-message pt-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- REMEMBER ME --}}


                                    <div class="form-group form-input">
                                        <label for="password" class="">{{ __('Password') }}</label>

                                        <div class="">
                                            <input id="password" type="password"
                                                class=" @error('password') is-invalid @enderror" name="password"
                                                required>

                                            @error('password')
                                                <span class="error-message pt-2" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-input">
                                        <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                                        <div class="">
                                            <input id="password-confirm" type="password" class=""
                                                name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <br>

                                    {{-- LOGIN BUTTON --}}

                                    <div class="">
                                        <button id="plantify-button" type="submit"
                                            class="btn btn-block btn-success text-uppercase my-2 mx-a">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </form>

                                <div class="text-center text-muted delimiter">or use a social network</div>
                                <div class="d-flex justify-content-center social-buttons">
                                    <button type="button" class="btn btn-danger btn-round mr-2" data-toggle="tooltip"
                                        data-placement="top" title="google">
                                        <a class="text-white" href="{{ route('login.google') }}"><i
                                                class="fab fa-google"></i></a>
                                        {{-- <i class="fab fa-twitter"></i> --}}
                                    </button>
                                    <button type="button" class="btn btn-primary btn-round mr-2" data-toggle="tooltip"
                                        data-placement="top" title="Facebook">
                                        <a class="text-white" href=" {{ route('login.facebook') }}"><i
                                                class="fab fa-facebook-square"></i></a>
                                    </button>
                                    </di>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-2">
                            <span> <input required type="checkbox" data-toggle="modal" data-target="#exampleModal"
                                    class="mb-3">
                                By checking, you agree to
                                Plantify's terms and conditions
                            </span>
                        </div>
                        <div class="text-center mt-1">
                            <button type="button" class="btn btn-dark mb-2" data-toggle="modal"
                                data-target="#exampleModalLong">
                                <a href="" class="text-white">View Plantify terms and conditions</a>
                            </button>
                        </div>

                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle" aria-required="true">Plantfy
                                            Terms and Conditions
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" aria-required="true" class="btn btn-dark"
                                            data-dismiss="modal">I have read
                                            the terms and conditions</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </ul>


            {{-- @if ($user->status == 'waiting')
    <img src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}} "
    style="border: 1px solid #cccccc; border-radius: 5px; width: 39px; height: auto; float: left; margin-right: 7px;"> --}}


            {{-- @if ($user->status == 'waiting')
    <img src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}} "
    style="border: 1px solid #cccccc; border-radius: 5px; width: 39px; height: auto; float: left; margin-right: 7px;"> --}}

    </nav>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('err'))
        <div class="alert alert-danger ">
            <p>{{ $message }}</p>
        </div>
    @endif

    @error('err')
        <div class="alert alert-danger ">
            <p>{{ $message }}</p>
        </div>>
    @enderror


    @yield('content')

    <!--Bootstrap JS,Cloudflare,Jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src='https://www.google.com/recaptcha/api.js?onload=recaptchaOnload&render=explicit' async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//www.google.com/recaptcha/api.js"></script>
    @yield('scripts')


    <script>
        $(document).ready(function() {
            $('.select-dropdown').select2();
        });
    </script>

    <br>

</body>

</html>
