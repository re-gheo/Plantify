@extends('layouts.template')

@section('content')
<div class="container">
    <div class="row px-2 pt-5">
        <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3">
            <div class="card-body mx-auto ">
                <h2 class="card-title text-center pb-3">Cellphone number for SMS verification</h2>
                <div class="card-body">
                    <form method="POST" action="/verify">
                        @csrf
                        @method('PUT')

                       <div>
                        
                            <label class="pb-1" for="cp_number" >Verification for cell phone number</label>

                            <div >
                                <input class="@error('cp_number') is-invalid @enderror form-input"  type="" id="cp_number" name="cp_number" placeholder="+63" pattern="[6]{1}[3]{1}[0-9]{10}" required autofocus> 
 
                                @error('cp_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div >
                       </div>
                        
                              

                        {{-- <input type="hidden" id="email" name="email" value={{ Auth::user->email }}> --}}

                    

                        <button class="btn btn-block btn-success text-uppercase my-2 mx-a button is-link" type="submit">SUBMIT</button>
                    </form>
                    @error('mes')
                    <span class=”invalid-feedback” role=”alert”>
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                        <div class="pt-2">
                         <a href="/">skip for now</a>

                        </div>
                      
                   
                </div> 
            
            </div>
        </div>
    </div>
</div>
      

        
    

@endsection
