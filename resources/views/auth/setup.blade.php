@extends('layouts.template')

@section('content')

    
      
<h1> Fill up some credentials</h1>

                <div class="card-body">
                    <form method="POST" action="setup/{{ Auth::user()->email }}">
                        @csrf
                        @method('PUT')

                       <div>
                        
                            <label for="govtid_number" > A Valid Government Number</label>

                            <div >
                                <input id="govtid_number" type="text" class=" @error('govtid_number') is-invalid @enderror" name="govtid_number" value="{{ old('govtid_number') }}" required autocomplete="govtid_number" autofocus>

                                @error('govtid_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div >
                       </div>
                        
                                <div >
                        
                            <label for="address" >Address</label>

                            
                               <div>
                                <input id="address" type="text" class=" @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               </div>
                                </div >
                        
 
                        <div >
                            <label for="birthday" >Birthday</label>

                            <div >
                                <input type="date" id="birthday" name="birthday">
                            </div>
                        </div>

                        {{-- <input type="hidden" id="email" name="email" value={{ Auth::user->email }}> --}}

                    

                        <button class="button is-link" type="submit">SUBMIT</button>

                        <div class="form-group row mb-0">
                         <a href="/">skip for now</a>

                        </div>

  
                    



                      
                    </form>
                </div> 
            
        
    

@endsection
