<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Plantify | Official Website</title>
<!--CSS Preamble-->
  <link rel="stylesheet" type="text/css" href="/css/register-style.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <link rel="stylesheet" href="/CSS/theme_1608565364473.css">
  <script src="https://kit.fontawesome.com/7026e01adc.js" crossorigin="anonymous"></script>
</head>

<body>
 
 <div class="container">
   <div class="row px-3">
     <div class="col-lg-10 col-xl-7 card flex-row mx-auto px-4 " >
       <div class="img-left d-none d-md-flex"></div>
        <div class="card-body">
          <h4 class="title text-center mt-4">Register your Plantify account here</h4>

        
          <form method="POST" action="{{ route('register') }}" class="form-box px-2">
            @csrf
          
            <div class="form-input">
              <input type="text" id="first_name" name="first_name" placeholder="First Name" tabindex="10" required>
            </div>
            <div class="form-input">
              <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
            </div>
            <div class="form-input">
              <input type="text" id="email" name="email" placeholder="email address" required>
            </div>
              <div class="form-input">
                <input type="password" id="password" name="password" placeholder="Password" required>
              </div>
              <div class="form-input">
                <input type="password" id="password-confirm"" name="password confirm"" placeholder="Confirm password" required>
              </div>
       
              {{-- <div class="form-input">
                <input type="Phone number" name="phone" id="phone" placeholder="Mobile Number" tabindex="13" required>
              </div>
              
              <div class="form-group row px-2">
                <label for="example-date-input" class="col-3 col-form-label">Birthday</label>
                <div class="col-6">
                  <input class="form-control" type="date" value="2011-08-19" id="example-date-input">
                </div>
              </div> --}}


              {{-- <fieldset class="form-group-gender">
                <legend>Gender</legend>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                    Male
                  </label>
                </div>
                <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                    Female
                  </label>
                </div>
                <div class="form-check disabled">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
                    Rather not say
                  </label>
                </div>
                </fieldset> --}}

          <div class="btn-group-vertical d-flex align-items-center">
            <button type="submit" class="facebook btn btn-block text-uppercase font-weight-bold">Register</button>

            <a href="{{url('/login/facebook')}}" class="btn btn-block btn-social btn-facebook btn-primary text-uppercase font-weight-bold my-2">
              <i class="fab fa-facebook-square"></i> Login with Facebook
            </a>

            <a href="{{url('/login/google')}}" class="btn btn-block btn-social btn-google btn-danger text-uppercase font-weight-bold">
              <i class="fab fa-google"></i> Login with Google
            </a>
          </div>

          <div class="text-center mb-2 my-2">
            <div class="text-center">
              Already have an account? <a href="/">Login here</a>
            </div>
          </div>
          </form>
        </div>
     </div>
   </div>
 </div>

       

        

  
      

          
    
      
    
    
  
</body>
</html>