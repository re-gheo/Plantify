@extends ('layouts/template')

@section('content')

    <div class="container">
        <div class="row px-2 pt-5">
            <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                <div class="card-body mx-auto  ">
                    <h3 class="card-title text-center pb-3">Let's Set up Your Store</h3>
                    <form method="POST" action="/store/setup">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="store_name">
                                <h5><b>Make a Name for Your Store</b> </h3>
                            </label>
                            <p><b>Note:</b> Your Store Name Cannot be changed</p>

                            <div class="form-input">
                                <input id="store_name" type="text" class=" @error('store_name') is-invalid @enderror"
                                    name="store_name" value="{{ old('store_name') }}" required autocomplete="store_name"
                                    autofocus>

                                @error('store_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div>

                            <label for="store_description">
                                <h5><b>Your Store Description</b> </h3>
                            </label>


                            <div class="form-input">

                                <textarea id="store_description" type="text"
                                    class=" @error('store_description') is-invalid @enderror" name="store_description"
                                    value="{{ old('store_description') }}" required autocomplete="store_description"
                                    autofocus cols="60" rows="10"></textarea>


                                @error('store_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>






                        <button class="btn btn-block btn-success text-uppercase my-2 mx-a" type="submit">Submit</button>


                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
