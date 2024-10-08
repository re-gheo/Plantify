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
                    <a class="nav-link" href="#">Messages <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('store.articles') }}">Articles <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('plant-information.index') }}">Plant References <span
                        class="sr-only">(current)</span></a>
                </li>



                {{-- <li class="nav-item">
                    <a class="nav-link" href="#">Notifications</a>
                </li> --}}
                &nbsp;

                <div class="div">
                    <li class="nav-item">
                        <form class=" form-inline my-2 my-lg-0 d-flex flex-row-reverse ">
                            <ul class="navbar-nav">

                                @if (!Auth::user())
                                    <a id="cta" class="nav-item" href="{{ route('loginf') }}">Login</a>
                                    &nbsp;
                                    <a id="cta" class="nav-item" href="{{ route('registerf') }}">Register Account</a>
                                @endif

                            </ul>
                        </form>
                    </li>
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


                            <a class="dropdown-item" href="{{ route('customer.profile.show') }}">User Settings</a>

                            @if (Auth::user()->user_role == 'admin')
                                <a class="dropdown-item" href="{{ route('admin.home') }}">Admin Controls</a>


                            @elseif(Auth::user()->user_role == 'retailer')
                                <a class="dropdown-item" href="{{ route('retailer.store.front') }}">Store Page</a>
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

        </ul>

        {{-- @if ($user->status == 'waiting')
    <img src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}} "
    style="border: 1px solid #cccccc; border-radius: 5px; width: 39px; height: auto; float: left; margin-right: 7px;"> --}}

        <div class="nav-search pl-2 pull-right">
            {{-- route subject to change for references search route --}}
            <form action="{{ route('products.search') }}" class="" method="GET" role="search">
                @csrf
                {{-- <select name="type" id="">
                    <option value="0">All</option>
                    <option value="1">Plant Products</option>
                    <option value="2">Other Products</option>
                </select> --}}
                <input id="search" type="text" class="" name="query" placeholder="Search here" aria-label="search-bar"
                    aria-describedby="basic-addon2">

                <button class="search-button btn btn-outline-success text-white"><i
                        class="fas fa-search"></i></button></button>
                {{-- <button class="search-button btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button> --}}
            </form>
        </div>


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

    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select-dropdown').select2();
        });
    </script>

    <br>
    <br>

    <!-- START OF FOOTER -->
    <!-- Kenny will make a new footer -->
    {{-- <footer class="site-footer mt-4 overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h6>About</h6>
                    <p class="text-justify">Plantify is an e-commerce platform that will introduce the Philippine
                        industry to serve and support the vast arrays of horticulture products that meet the sellers and
                        the consumers into one channel, a centralized market to buy and sell botany products.
                    </p>
                </div>

                <div class="col-xs-6 col-md-3">
                    <h6>Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="http://scanfcode.com/about/">About Us</a></li>
                        <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
                        <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
                        <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
                        <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by
                        <a href="/"><i class="fas fa-leaf mr-1"></i>Plantify</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <ul class="social-icons">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer> --}}


</body>

</html>


{{-- <div class="input-group mr-auto ">
  <form action="" method="GET" role="search">
  <input id="search" type="text" class="form-input" placeholder="Search here" aria-label="search-bar" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <a href="" class=" mt-1"></a>
    <button id="search-button" class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
  </div>

</form>
</div> --}}
