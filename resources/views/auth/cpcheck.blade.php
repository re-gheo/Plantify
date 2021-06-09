@extends('layouts.template')

@section('content')

    <div class="container">
        <div class="row px-2 pt-5">
            <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3">
                <div class="card-body mx-auto">
                    <h2>Enter sms Verification Code</h2>
                    <div class="card-body">
                        <form method="POST" action="{{ route('OTP.verifycheck') }}">
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


                            <button class="btn btn-block btn-success text-uppercase my-2 mx-a button is-link"
                                type="submit">SUBMIT</button>

                            <div class="form-group row mb-0">

                        </form>

                        @error('mes')
                            <span class=”invalid-feedback” role=”alert”>
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div>
                            <form method="POST" action="{{ route('OTP.verifycancel') }}">
                                @csrf
                                <button class="btn btn-danger my-2 mx-a button is link" type="submit">cancel</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- <br>

    <br>
    <p>please wait at least 1 minute for you to recieve your code via sms </p>

    <div class="card-body">

    </div> --}}



@endsection
