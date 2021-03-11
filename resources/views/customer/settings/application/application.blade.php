@extends ('layouts/template')

@section('content')

    <div class="container">


        <div class="col-lg-8 col-xl-6 card flex-row mx-auto px-4 shadow p-3 mb-5 border-3 mr-5">
            <div class="card-body">
                <h3 class="text-center">Provide further details here</h3>
                <hr>
                <form action="/settings/application/form" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-input">
                        <label for="retailer_address">Retailers Full address for pickup</label>
                        <div>
                            <input id="retailer_address" type="text"
                                class=" @error('retailer_address') is-invalid @enderror" name="retailer_address" required
                                autocomplete="retailer_address">

                            @error('retailer_address')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-input">
                        <label for="retailer_postalcode">Retailers Postal Code</label>
                        <div>
                            <input id="retailer_postalcode" type="text"
                                class=" @error('retailer_postalcode') is-invalid @enderror" name="retailer_postalcode"
                                placeholder="0000" pattern="[0-9]{4}" autocomplete="retailer_postalcode">

                            @error('retailer_postalcode')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-input">
                        <label for="retailer_personincharge">Full name of the Person In-charge/Owner of this store
                        </label>
                        <div>
                            <input id="retailer_personincharge" type="text"
                                class=" @error('retailer_personincharge') is-invalid @enderror"
                                name="retailer_personincharge" required readonly
                                value="{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}"
                                autocomplete="retailer_personincharge">

                            @error('retailer_personincharge')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class=" mt-2">
                        <label for="retailer_officialidfront">An Official ID card picture of the card [Front
                            Scan]</label>
                        <div>
                            <input class="btn btn-success  mt-2 " type="file" name="retailer_officialidfront"
                                id="retailer_officialidfront" required accept="image/x-png ,image/jpeg">
                        </div>
                    </div>

                    <div class="mt-2">
                        <label for="retailer_officialidback">An Official ID card picture of the card [Back Scan]</label>
                        <div>
                            <input class="btn btn-success mt-2 " type="file" name="retailer_officialidback"
                                id="retailer_officialidback" required accept="image/x-png ,image/jpeg">
                        </div>
                    </div>





                    {{-- <div>
                            <label for="retailer_officialidfront">An Official ID card picture of the card [Front
                                Scan]</label>
                            <div>
                                <input type="file" name="retailer_officialidfront" id="retailer_officialidfront" required
                                    accept="image/x-png ,image/jpeg">
                            </div>
                        </div> --}}

                    {{-- <div>
                            <label for="retailer_officialidback">An Official ID card picture of the card [Back Scan]</label>
                            <div>
                                <input type="file" name="retailer_officialidback" id="retailer_officialidback" required
                                    accept="image/x-png ,image/jpeg">
                            </div>
                        </div> --}}

                    <div class="form-input">
                        <label for="retailer_idnumber">Full ID number of the submitted ID picture.</label>
                        <div>
                            <input id="retailer_idnumber" type="text"
                                class=" @error('retailer_idnumber') is-invalid @enderror" name="retailer_idnumber"
                                pattern="[0-9]{6}" required autocomplete="retailer_idnumber">

                            @error('retailer_idnumber')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- <div>
                    <label for="retailer_city">City</label>
                    <div>
                        <input id="retailer_city" type="text" class=" @error('retailer_city') is-invalid @enderror" name="retailer_city" required autocomplete="retailer_city">
            
                            @error('retailer_city')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div> --}}

                    <div class="form-input">
                        <label for="retailer_barangay">Barangay Name/Location</label>
                        <div>
                            <input id="retailer_barangay" type="text"
                                class=" @error('retailer_barangay') is-invalid @enderror" name="retailer_barangay" required
                                autocomplete="retailer_barangay">

                            @error('retailer_barangay')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-input">
                        <label for="retailer_region">Region: NCR by default</label>
                        <div>
                            <input id="retailer_region" type="text" class=" @error('retailer_region') is-invalid @enderror"
                                name="retailer_region" required readonly value="NCR" autocomplete="retailer_region">

                            @error('retailer_region')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-input">
                        <label for="retailer_city">City location of your Business: <span class="text-small">only
                                supports NCR areas
                                only</span>
                        </label>

                        <div class="input-select">
                            <select id="retailer_city" required name="retailer_city">
                                <option value="Manila">Manila</option>
                                <option value="Mandaluyong">Mandaluyong</option>
                                <option value="Marikina">Marikina</option>
                                <option value="Pasig">Pasig</option>
                                <option value="Quezon City">Quezon City</option>
                                <option value="San Juan">San Juan</option>
                                <option value="Caloocan">Caloocan</option>
                                <option value="Navotas">Navotas</option>
                                <option value="Valenzuela">Valenzuela</option>
                                <option value="Las Piñas">Las Piñas</option>
                                <option value="Makati">Makati</option>
                                <option value="Metro Manila">Metro Manila</option>
                            </select>


                        </div>
                    </div>





                    <br>
                    <div>
                        <button type="submit" class="btn btn-block btn-success text-uppercase my-2 mx-a">Send
                            Application</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
    </div>


    {{-- <div>
        <label for="retailer_city">City</label>
        <div>
            <input id="retailer_city" type="text" class=" @error('retailer_city') is-invalid @enderror" name="retailer_city" required autocomplete="retailer_city">

                @error('retailer_city')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div> --}}



@endsection
