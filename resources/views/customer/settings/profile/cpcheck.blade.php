@extends('layouts.template')

@section('content')



    <br>
    <br>
    <h1>Enter sms Verification Code</h1>
    <br>
    <p>please wait at least 1 minute for you to recieve your code via sms </p>

    <div class="card-body">
        <form method="POST" action="{{ route('customer.profile.pcheckcode') }}">
            @csrf
            @method('PUT')

            <div>

                <label for="code">We have sent you a code via SMS</label>

                <div>
                    <input class=" @error('code') is-invalid @enderror" type="pin" id="code" name="code"
                        placeholder="6 Number Code" pattern="[0-9]{6}" required autofocus>

                    @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <button class="button is-link" type="submit">SUBMIT</button>

            <div class="form-group row mb-0">

        </form>

        @error('mes')
            <span class=”invalid-feedback” role=”alert”>
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div>
            <form method="POST" action="{{ route('customer.profile.pcancelcode') }}">
                 @csrf
                <button class="button is-link" type="submit">cancel</button>
            </form>
        </div>

    </div>




@endsection
