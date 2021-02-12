@extends('layouts.template')

@section('content')

           
                            <h3 >EDIT PROFILE</h3>
                            <form method="POST" action="/settings/profile/update">
                                @csrf
                                @method('PUT')

                                <div>             
                                    <label for="first_name" > First Name</label>
        
                                    <div class="form-input" >
                                        <input id="first_name" type="text" class=" @error('first_name') is-invalid @enderror" name="first_name" value="{{ $profile->first_name }}" required autocomplete="first_name" autofocus>
        
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div >
                                </div>

                                <div>             
                                    <label for="last_name" > Last Name</label>
        
                                    <div class="form-input" >
                                        <input id="last_name" type="text" class=" @error('last_name') is-invalid @enderror" name="last_name" value="{{ $profile->last_name }}" required autocomplete="last_name" autofocus>
        
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div >
                                </div>

                                <div>             
                                    <label for="govtid_number" > Government Number</label>
        
                                    <div class="form-input" >
                                        <input id="govtid_number" type="text" class=" @error('govtid_number') is-invalid @enderror" name="govtid_number" value="{{ $profile->govtid_number }}"  autocomplete="govtid_number" autofocus>
        
                                        @error('govtid_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div >
                                </div>

                                
                                
                                <div>
                                
                                    <label for="address" >Address</label>
    
                                
                                    <div class="form-input">
                                    <input id="address" type="text" class=" @error('address') is-invalid @enderror" name="address" value="{{ $profile->address }}"  autocomplete="address" autofocus>
                                        <div>
                                            <p> <b>Note:</b> We currently only support delivery areas in NCR Phillipines for now.</p>
                                        </div>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror


                                    </div>
                                </div>
                                
         
                                    <div class="form-input">
                                        <label for="birthday" >Birthday</label>
            
                                        <div >
                                            <input type="date" id="birthday" name="birthday" value="{{ $profile->birthday }}">
                                        </div>
                                    </div>
        
        
                            
        
                                <button class="btn  btn-success text-uppercase" type="submit">update</button>
        
                                                      
                            </form>
                
        
    

@endsection
