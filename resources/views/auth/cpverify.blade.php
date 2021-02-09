@extends('layouts.template')

@section('content')

    
      
<h1> Enter Cellphone number for SMS verification</h1>

                <div class="card-body">
                    <form method="POST" action="/verify">
                        @csrf
                        @method('PUT')

                       <div>
                        
                            <label for="cp_number" >Verification for cell phone number</label>

                            <div >
                                <input  class=" @error('cp_number') is-invalid @enderror" type="" id="cp_number" name="cp_number" placeholder="+63" pattern="[6]{1}[3]{1}[0-9]{10}" required autofocus>
 
                                @error('cp_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div >
                       </div>
                        
                              

                        {{-- <input type="hidden" id="email" name="email" value={{ Auth::user->email }}> --}}

                    

                        <button class="button is-link" type="submit">SUBMIT</button>
                    </form>
                    @error('mes')
                    <span class=”invalid-feedback” role=”alert”>
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                        <div class="form-group row mb-0">
                         <a href="/">skip for now</a>

                        </div>
                      
                   
                </div> 
            
        
    

@endsection
