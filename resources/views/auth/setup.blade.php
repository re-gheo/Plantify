@extends('layouts.login-style')

@section('content')

    <div class="container">

        <div class="container">
            <ol class="breadcrumb">

            </ol>
        </div>


        <div class="row px-2 pt-5">

            <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                <div class="card-body mx-auto  ">
                    <h3 class="card-title text-center pb-3">Fill in some credentials</h3>
                    <form method="POST" action="{{ route('addc.setupput', ['email' => Auth::user()->email]) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="govtid_number"> A Valid Government Number</label>

                            <div class="form-input">
                                <input id="govtid_number" type="text" class=" @error('govtid_number') is-invalid @enderror"
                                    name="govtid_number" value="{{ old('govtid_number') }}" required
                                    autocomplete="govtid_number" autofocus>

                                @error('govtid_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>

                            <label for="address">Address</label>


                            <div class="form-input">
                                <input id="address" type="text" class=" @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                                <div>
                                    <p> We currently only support delivery areas in NCR Phillipines for now.</p>
                                </div>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-input">
                            <label for="birthday">Birthday</label>

                            <div>
                                <input class="datepicker" type="date" id="birthday" name="birthday" endDate="today"
                                    max="{{ Carbon\Carbon::today('Asia/Manila')->subYear(10)->toDateString() }}">
                            </div>
                        </div>


                        {{-- <input type="hidden" id="email" name="email" value={{ Auth::user->email }}> --}}



                        <button class="btn btn-block btn-success text-uppercase my-2 mx-a" type="submit">SUBMIT</button>

                        <div class="pt-2">
                            <a href="{{ route('OTP.verify') }}">skip for now</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection
