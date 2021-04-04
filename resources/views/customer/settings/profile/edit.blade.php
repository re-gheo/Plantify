@extends('layouts.template')

@section('content')


    <div class="container">
        <div class="row px-2">
            <div class="col-lg-8 col-xl-6 card flex-row mx-auto px-4 shadow p-3 mb-5 border-3">
                <div class="card-body mx-auto">
                    <h3 class="text-center">EDIT PROFILE</h3>

                    <form method="POST" action="{{ route('customer.profile.update') }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="first_name"> First Name</label>

                            <div class="form-input">
                                <input id="first_name" type="text" class=" @error('first_name') is-invalid @enderror"
                                    name="first_name" value="{{ $profile->first_name }}" required
                                    autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="last_name"> Last Name</label>

                            <div class="form-input">
                                <input id="last_name" type="text" class=" @error('last_name') is-invalid @enderror"
                                    name="last_name" value="{{ $profile->last_name }}" required autocomplete="last_name"
                                    autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="govtid_type"> Government ID Type</label>

                            <div class="form-input">
                                <select id="govtid_type" type="text" class="@error('govtid_number') is-invalid @enderror"
                                name="govtid_type" value="{{ old('govtid_type') }}" required>

                                <option value="SSS">Social Security System</option>
                                <option value="GSIS">Government Service Insurance System</option>
                                <option value="UMI">Unified Multi-Purpose Identification</option>
                                <option value="LTO">LTO Driver’s License</option>
                                <option value="PRC">Professional Regulatory Commission</option>
                                <option value="OWWA">OWWA E-Card</option>
                                <option value="COE">Commission on Elections (COMELEC) Voter's ID</option>
                                <option value="SC">Senior Citizen ID</option>
                                <option value="PASS">Passport</option>

                                </select>

                                @error('govtid_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="govtid_number"> Government Number</label>

                            <div class="form-input">
                                <input id="govtid_number" type="text" class=" @error('govtid_number') is-invalid @enderror"
                                    name="govtid_number" value="{{ $profile->govtid_number }}"
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
                                    name="address" value="{{ $profile->address }}" autocomplete="address" autofocus>
                                <div>
                                    <p> <b>Note:</b> We currently only support delivery areas in NCR Phillipines for now.
                                    </p>
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
                                <input type="date" id="birthday" name="birthday" value="{{ $profile->birthday }}"
                                    max="{{ Carbon\Carbon::today('Asia/Manila')->subYear(10)->toDateString() }}">
                            </div>
                        </div>




                        <button class="btn  btn-success text-uppercase" type="submit">update</button>


                    </form>

                </div>
            </div>
        </div>
    </div>






@endsection
