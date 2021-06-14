<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{!! asset('/css/main.css') !!}">
    <link rel="stylesheet" href="{!! asset('/css/plantify_theme.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! secure_asset('/css/main.css') !!}">
    <link rel="stylesheet" href="{!! secure_asset('/css/plantify_theme.css') !!}">
    <link rel="stylesheet" type="text/css" href="/CSS/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" href="/CSS/plantify_theme.css">
    <script src="https://kit.fontawesome.com/7026e01adc.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plantify Admin</title>
    <link rel="icon" href="{{ asset('icon.ico') }}" />

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
</head>

<body>
    <!-- Vertical navbar -->
    <div class="vertical-nav bg-white " id="sidebar">

        <div class="px-3 bg-dark "> <a class="navbar-brand  " href="{{ route('store') }}"><i
                    class="fas fa-leaf small mr-2 "></i>Plantify</a>
        </div>

        <!-- START OF SIDEBAR CONTENT -->
        <div class="py-4 px-3 mb-4 bg-dark">
            <div class="media d-flex align-items-center">
                <img class="admin-avatar " src="{{ Auth::user()->profile_picture }}" alt="{{ Auth::user()->name }}">
                <div class="media-body">
                    <a href="{{ route('customer.profile.show') }}">
                        <h4 class="m-0 text-white">{{ Auth::user()->name }}</h4>
                    </a>

                    <p class="font-weight-normal text-muted mb-0"> {{ Auth::user()->user_role }}</p>
                </div>
            </div>
        </div>

        <p class="text-dark font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="{{ route('admin.home') }}" class="nav-link text-dark bg-light">
                    <i class="fas fa-leaf mr-3 text-primary fa-fw"></i>
                    home
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link text-dark">
                    <i class="fas fa-user-alt mr-3 text-primary fa-fw"></i>
                    manage accounts
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.list') }}" class="nav-link text-dark">
                    <i class="fa fa-address-card mr-3 text-primary fa-fw"></i>
                    admin accounts
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('admin.category.get') }}" class="nav-link text-dark">
                    <i class="far fa-list-alt mr-3 text-primary fa-fw"></i>
                    categories
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('articles.index') }}" class="nav-link text-dark">
                    <i class="fas fa-newspaper mr-3 text-primary fa-fw"></i>
                    Articles
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.customer_application.get') }}" class="nav-link text-dark">
                    <i class="fas fa-key mr-3 text-primary fa-fw"></i>
                    Customer Applications
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.reference.get') }}" class="nav-link text-dark">
                    <i class="fas fa-seedling mr-3 text-primary fa-fw"></i>
                    References
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.keyword.get') }}" class="nav-link text-dark">
                    <i class="fas fa-building mr-3 text-primary fa-fw"></i>
                    Keywords
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="/" class="nav-link text-dark">
                    <i class="fas fa-store  mr-3 text-primary fa-fw"></i>
                    Storefront
                </a>
            </li> --}}
        </ul>

        <!--CHART DIAGRAMS STUFF !!NO DATA VIZSUALIZATION IN PLANTIFY !!-->
        {{-- <p class="text-gray font-weight-bold text-uppercase px-3 small py-4 mb-0">Charts</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="fa fa-area-chart mr-3 text-primary fa-fw"></i>
                    area charts
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="fa fa-bar-chart mr-3 text-primary fa-fw"></i>
                    bar charts
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="fa fa-pie-chart mr-3 text-primary fa-fw"></i>
                    pie charts
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-dark">
                    <i class="fa fa-line-chart mr-3 text-primary fa-fw"></i>
                    line charts
                </a>
            </li>
        </ul> --}}
    </div>
    <!-- End vertical navbar -->
    <nav id="plantify-navbar" class="navbar bg-dark navbar-expand-lg  ">

        <a class="navbar-brand " href="#"><i class="fas fa-leaf mr-2 "></i>Plantify</a>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown mr-3">

                    <img class="nav-avatar" src="{{ Auth::user()->profile_picture }}" alt="{{ Auth::user()->name }} ">



                    <a id="navbarDropdown" class="nav-link dropdown-toggle mr-5" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        {{-- <a class="dropdown-item" href="/settings/profile">Account Settings</a> --}}

                        @if (Auth::user()->user_role == 'retailer')
                            <a class="dropdown-item" href="{{ route('store') }}">Storefront</a>
                        @endif

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>


                    </div>
                </li>
            @endguest
        </ul>


    </nav>



    @yield('content')
    <br>
    <br>


    <div class="footer-margin">
        <footer class="card-footer bg-dark footer-font-style text-muted fixed-bottom">
            <p>© 2021 Team Olverd</p>
        </footer>
    </div>

    <!--Bootstrap JS,Cloudflare,Jquery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="/js/main.js"></script>
    <script src="main.js"></script>
    @yield('scripts')

</body>

</html>
