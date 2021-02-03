<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plantify</title>
<!--CSS Preamble-->
  <link rel="stylesheet" type="text/css" href="/CSS/login-style.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <link rel="stylesheet" href="/CSS/theme_1608565364473.css">
  <script src="https://kit.fontawesome.com/7026e01adc.js" crossorigin="anonymous"></script>
</head>

<!--MAIN CONTAINER-->
<body>
  <div class="container">
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <div class="img-left d-none d-md-flex"></div>

        <div class="card-body " >
    <!--LOGIN FORM-->
       <h4 class="title text-center mt-4">Login To Plantify</h4>
          
       <form method="POST" action="/retailer/login" class="form-box px-3 ">
        @csrf
          <div class="form-input">
            <span><i class="fa fa-envelope-o"></i></span>
            <input type="email" name="email" placeholder="Email Address" tabindex="10" required>
          </div>
          <div class="form-input">
            <span><i class="fa fa-key"></i></span>
            <input type="password" name="password" placeholder="Password" required>
          </div>

      <!--Forget Password and Remember me-->
          <div class="aux-container">
            <div class="mb-4">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="cb1" name="">
                <label class="custom-control-label" for="cb1">Remember me</label>
              </div>
            </div>
  
            <div class="text-right">
              <a href="#" class="forget-link">
                Forget Password?
              </a>
            </div>
          </div>
          

        <!--Buttons-->

          <div class="btn-group-vertical d-flex align-items-center">
            <button type="submit" class="btn btn-block text-uppercase   ">
              Login
            </button>

            <a href="#" class="btn btn-block btn-social btn-facebook btn-primary text-uppercase font-weight-bold my-2">
              <i class="fab fa-facebook-square"></i>    Login with Facebook
            </a>

            <a href="#" class="btn btn-block btn-social btn-google btn-danger text-uppercase font-weight-bold">
              <i class="fab fa-google"></i> Login with Google
            </a>
          </div>
          
          <div class="form-group">
            &nbsp;
          </div>

          <div class="text-center mb-2">
            <div class="text-center">
              Don't have an account? <a href="/retailer/register">Register here</a>
            </div>
          </div>

            </div>
          </div>
       </div>
  
       </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>