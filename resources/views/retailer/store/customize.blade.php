@extends ('layouts/template')

@section('content')
    <form method="POST" action="/store/setup">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row px-2 pt-5">
                <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                    <div class="card-body mx-auto  ">
                        <h3 class="card-title text-center pb-3">{{ $store->store_name }}</h3>



                        <h3><b>Your Store profile</b> </h3>


                        <div>
                            <img src="{{ url('/storage/' . $store->store_backgroundimage) }}" alt="background">
                        </div>

                        <div>
                            <label for="store_backgroundimage">main photo for this plant</label>
                            <div>
                                <input type="file" name="store_backgroundimage" id="store_backgroundimage" required>

                                @error('store_backgroundimage')
                                    <span class="" role="alert">
                                        <strong> Please upload the main photo for this Plant</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <img src="{{ url('/storage/' . $store->store_profileimage) }}" alt="profile">
                        </div>
                        <div>
                            <label for="store_profileimage">main photo for this plant</label>
                            <div>
                                <input type="file" name="store_profileimage" id="store_profileimage" required>

                                @error('store_profileimage')
                                    <span class="" role="alert">
                                        <strong> Please upload the main photo for this Plant</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div>

                    <label for="store_description">
                        <h5><b>Your Store Description</b> </h3>
                    </label>
                    <div class="form-group green-border-focus">

                        <textarea id="store_description" type="text"
                            class=" @error('store_description') is-invalid @enderror form-control" name="store_description" value="{{ old('store_description') }}" 
                            required autocomplete="store_description" autofocus cols="60" 
                            rows="10">{{ $store->store_description }}
                        </textarea>
                        @error('store_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

        </div>
        <div class="container">
            <div class="row px-2 pt-5">
                <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                    <label for="cod_option">
                        <h3>Cash on delivery option</h3>
                    </label><br />


                    <label class="radio-inline"><input type="radio" name="cod_option" id="cod_option" value="1"
                            {{ $store->cod_option == 1 ? 'checked' : '' }}>Yes</label>
                    <label class="radio-inline"><input type="radio" name="cod_option" id="cod_option" value="0"
                            {{ $store->cod_option == 0 ? 'checked' : '' }}> No</label>
                </div>

                <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                    <label for="">
                        <h3>your phone number</h3>
                    </label>
                    <p> {{ $store->store_phonenumber }}</p>
                    <a href="">Update Phone number</a>
                </div>

                <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                    <h3>Cash out options</h3>
                    <a href="">register a card</a>
                    <br>
                    <a href="">register a gcash number</a>
                </div>

                <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                    <h3>Advertisement Status</h3>
                    <a href="">Buy Advertisement</a>
                   
                </div>

            </div>
        </div>

        <button class="btn btn-success text-uppercase my-2 mx-a" type="submit">UPDATE STORE PAGE </button>
    </form>
@endsection
