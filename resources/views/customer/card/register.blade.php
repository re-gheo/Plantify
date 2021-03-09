@extends ('layouts/template')
@section('content')

    <div class="container">
        <div class="row px-2">
            <div class="col-lg-8 col-xl-6 card flex-row mx-auto px-4 shadow p-3 mb-5 border-3">
                <div class="card-body mx-auto">
                    <form action="/store/profile/addpayment/register" method="POST">
                        @csrf
                        <div class="text-center">
                            <h3>Card information</h3>
                        </div>

                        <div class="form-input">
                            <p>Number</p>
                            <input type="text" name="card_number" required id="card_number"
                                value="{{ old('card_number') }}">
                            @error('card_number')
                                <div>
                                    invalid number does no align with lughn algortihm
                                </div>
                            @enderror
                        </div>

                        <div class="form-input">
                            <p>Name on Card</p>
                            <input type="text" name="card_holdername" required id="card_holdername"
                                value="{{ old('card_holdername') }}">
                            @error('card_holdername')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-input">
                            <p>cvv</p>
                            <input type="text" name="card_cvv" required id="card_cvv" value="{{ old('card_cvv') }}">
                            @error('card_cvv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-input">
                            <p>expiration date</p>
                            <input type="month" name="card_exp" required id="card_exp"
                                min="{{ Carbon\Carbon::today('Asia/Manila')->subYear(1)->format('Y-m') }}"
                                max="{{ Carbon\Carbon::today('Asia/Manila')->addYear(3)->format('Y-m') }}"
                                value="{{ old('card_exp') }}">
                            @error('card_exp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-input">
                            <hr>
                            <h3>Billing Address</h3>
                            <p>Address line </p>
                            <input type="text" name="card_line1" required id="card_line1" value="{{ old('card_line1') }}">
                            @error('card_line1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>



                        <div class="form-input">
                            <p>City </p>
                            <input type="text" name="card_city" required id="card_city" value="{{ old('card_city') }}">
                            @error('card_city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-input">
                            <p>State</p>
                            <input type="text" name="card_state" required id="card_state"
                                value="{{ old('card_state') }}">
                            @error('card_state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-input">
                            <p>Postal Code</p>
                            <input type="text" name="card_postal_code" required id="card_postal_code"
                                value="{{ old('card_number') }}">
                            @error('card_postal_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>




                        <br>
                        <button class="btn btn-block btn-success text-uppercase my-2 mx-a" type="submit"> Save Card</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
