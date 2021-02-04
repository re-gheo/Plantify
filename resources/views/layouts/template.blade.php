<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Plantify | Official Page</title>

  <!--CSS Preamble-->
  <link rel="stylesheet" type="text/css" href="/CSS/template-style.css">
 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <link rel="stylesheet" href="/CSS/theme_1608565364473.css">
  <script src="https://kit.fontawesome.com/7026e01adc.js" crossorigin="anonymous"></script>
</head>
<body>
  
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex">
  <a class="navbar-brand" href="#"><img src="/css/plantify-logo.svg" alt="plantify-logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="#"><i class="fas fa-envelope pr-1"></i>Messages <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-bell pr-1"></i>Notifications</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle pr-1"></i>Profile</a>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @if(!Auth::user())
          <a class="dropdown-item" href="/retailer/login">Login</a>
          <a class="dropdown-item" href="/retailer/register">Register Account</a>
          @else
          <form method="POST" action="{{route('logout')}}">
            @csrf
         <button class="dropdown-item">
            Logout
         </button>
        </form>
          @endif
       
         
        </div>
      </li> 

      <li> 
       </li>
    </ul>

 

    <form class="form-inline my-2 my-lg-0">
    
        <a class="nav-link" href="#"><i class="fas fa-shopping-cart pr-1 "></i>Cart</a>
  
      <div class="input-group ">
        <input id="search" type="text" class="form-control" placeholder="Search here" aria-label="search-bar" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button id="search-button" class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </form>
  </div>
</nav>

@yield('content')

 <!--Bootstrap JS,Cloudflare,Jquery-->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>