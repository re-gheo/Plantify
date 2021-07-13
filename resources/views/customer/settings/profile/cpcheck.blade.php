@extends('layouts.template')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3">

                <h1 class="mt-2">Enter sms Verification Code</h1>
                <br>
                <p>please wait at least 1 minute for you to recieve your code via sms </p>

                <form method="POST" action="{{ route('customer.profile.pcheckcode') }}">
                    @csrf
                    @method('PUT')

                    <div>

                        <label for="code">We have sent you a code via SMS</label>

                        <div class="form-input">
                            <input class=" @error('code') is-invalid @enderror" type="pin" id="code" name="code"
                                placeholder="6 Number Code" pattern="[0-9]{6}" required autofocus>

                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <button class="btn btn-block btn-success text-uppercase" type="submit">SUBMIT</button>

                    <div class="form-group row mb-0">

                </form>

                @error('mes')
                    <span class=”invalid-feedback” role=”alert”>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <div class="container text-center">
                    <form method="POST" action="{{ route('customer.profile.pcancelcode') }}">
                        @csrf
                        <button class="btn btn-danger text-uppercase" type="submit">cancel</button>
                    </form>
                </div>

                <div class="container text-center mt-2">
                    <a href="{{ route('customer.profile.show') }}">Go back to profile</a>
                </div>
            </div>
        </div>
    </div>



@endsection
