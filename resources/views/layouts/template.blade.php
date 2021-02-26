<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plantify | Official</title>

    <!--CSS Preamble-->
    <link rel="stylesheet" type="text/css" href="/CSS/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" href="/CSS/plantify_theme.css">
    <script src="https://kit.fontawesome.com/7026e01adc.js" crossorigin="anonymous"></script>
    <script src="/js/main.js"></script>
</head>

<body>

    <!--Navbar-->

    <nav id="plantify-navbar" class="navbar navbar-expand-lg  ">
        <a class="navbar-brand " href="/"><i class="fas fa-leaf mr-1"></i>Plantify</a>
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

                <li class="nav-item">
                    <a class="nav-link" href="#">Notifications</a>
                </li>

                <li class="nav-item">
                    <form class=" form-inline my-2 my-lg-0 d-flex flex-row-reverse ">
                        <ul class="navbar-nav">

                            @if (!Auth::user())
                                <a id="cta" class="nav-item" href="/login">Login</a>
                                <a id="cta" class="nav-item" href="/register">Register Account</a>
                            @endif

                        </ul>
                    </form>
                </li>

                <div class="d-flex flex-row-reverse">
                    @if (isset(Auth::user()->avatar))
                        <img src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}"
                            style="border: 1px solid #cccccc; border-radius: 5px; width: 39px; height: auto; float: left; margin-right: 7px;">
                    @endif


                </div>

                <li class="nav-item dropdown">

                    @if (!Auth::user())
                    @else
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                            {{-- With pages made --}}
                            <a class="dropdown-item" href="/settings/profile">Account Settings</a>

                            @if (Auth::user()->user_role == 'admin')
                                <a class="dropdown-item" href="/admin/home">Admin Controls</a>


                            @elseif(Auth::user()->user_role == 'retailer')
                                <a class="dropdown-item" href="/store">Store Page</a>
                            @endif

                            {{-- With no pages made
            <a class="dropdown-item" href="">Account Settings</a>

            <a class="dropdown-item" href="">Customization Settings</a>
            <a class="dropdown-item" href="">Preference Settings</a>
            <a class="dropdown-item" href="">Order History</a> --}}




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
            <form action="" class="" method="GET" role="search">
                <input id="search" type="text" class="" placeholder="   Search here" aria-label="search-bar"
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

    @error('err')
        <span class="alert alert-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
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
