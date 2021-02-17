<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/CSS/main.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <link rel="stylesheet" href="/CSS/plantify_theme.css">
  <script src="https://kit.fontawesome.com/7026e01adc.js" crossorigin="anonymous"></script>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <nav id="plantify-navbar" class="navbar bg-dark navbar-expand-lg  ">

    <a class="navbar-brand" href="/admin/home"><i class="fas fa-leaf mr-1"></i>Plantify</a>
       <!-- Left Side Of Navbar -->
       <button class="navbar-toggler " id="toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i id="bars" class="fas fa-bars"></i></span>
      </button>
      <div class="dropdown">
          <button class="btn dropdown-toggle text-white ml-4" data-toggle="dropdown">
            Menu
          </button>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/admin/plantreference/">Reference List</a></li>
              <li> <a class="dropdown-item" href="/admin/account-management">User Accounts</a></li>
              <li> <a class="dropdown-item" href="/admin/categories">Categories</a></li>
              <li><a class="dropdown-item" href="/admin/customer_application/">Pending Applications</a></li>
              <li><a class="dropdown-item" href="/articles">articles</a></li>
          </ul>
      </div>
 
 
     <!-- Right Side Of Navbar -->
     <ul class="navbar-nav ml-auto mr-5">
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
          <li class="nav-item dropdown">
              @if(isset(Auth::user()->avatar))
              <img src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}" 
              style="border: 1px solid #cccccc; border-radius: 5px; width: 39px; height: auto; float: left; margin-right: 7px;">
              @endif
           

              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
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
   <!--Bootstrap JS,Cloudflare,Jquery-->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>