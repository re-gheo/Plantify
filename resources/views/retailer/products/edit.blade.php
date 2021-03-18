@extends ('layouts/template')

@section('content')


    <div class="container">
        <div class="row px-2">
            <div class="col-lg-8 col-xl-6 card flex-row mx-auto px-4 shadow p-3 mb-5 border-3">
                <div class="card-body mx-auto">
                    <h1> Edit this product</h1>

                    <form action="{{ route('retailer.products.update', ['id' => $product->product_id]) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('put')
                        <div class="form-input">
                            <label for="product_name"> Name of the Product </label>
                            <br>
                            <input id="product_name" type="text"
                                class=" @error('product_name') 
                                                                                                                is-invalid @enderror" name="product_name"
                                autocomplete="product_name" value="{{ $product->product_name }}">

                            @error('product_name')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="mt-2">
                            <label for="product_description"> Description of the product </label>
                            <br>
                            <textarea class="txtarea" id="product_description"
                                class=" @error('product_description') 
                                                                                                                        is-invalid @enderror" name="product_description"
                                autocomplete="product_description" cols="30"
                                rows="10">{{ $product->product_description }}</textarea>

                            @error('product_description')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @if ($product->isPlant == 1)
                            <div class="form-input">
                                <label for="product_sizes"> Plant Size in inches </label>
                                <br>
                                <input class="cart-input" id="product_sizes" type="number"
                                    class=" @error('product_sizes') 
                                                                                                            is-invalid @enderror" name="product_sizes"
                                    value="{{ $product->product_sizes }}" autocomplete="product_sizes">

                                @error('product_sizes')
                                    <span class="" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="plant_referenceid">Plant refrence</label>
                            <br>
                            <select name="product_referenceid" id="product_referenceid">
                                <option value="{{ $product->plant_referenceid }}" selected>
                                    {{ $product->plant_scientificname }}
                                    [SELECTED] </option>
                                @foreach ($refs as $ref)
                                    <option value="{{ $ref->plant_referenceid }}">{{ $ref->plant_scientificname }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                        <br>



                        <div class="">
                            <div>
                                <label for="">TAGS</label> <br>
                                @foreach ($keys as $key)
                                    <label for="keywords">{{ $key->keyword_name }}</label>
                                    <input type="checkbox" name="keywords[]" value="{{ $key->keyword_id }}" @foreach ($askeys as $akey) 
                                        @if ($akey->owned_keywordid==$key->keyword_id)
                                    {{ $akey->owned_keywordid }} is checked @endif
                                @endforeach
                                />
                                @endforeach
                            </div>
                        </div>

                        @error('keywords')
                            <span class="" role="alert">
                                <strong>{{ $message }} : At least 1 keyword required</strong>
                            </span>
                        @enderror

                        <div>
                            <label for="product_price"> Price (Php) </label>
                            <br>
                            <input id="product_price" type="number"
                                class=" @error('product_price') 
                                                                                                                is-invalid @enderror" name="product_price"
                                autocomplete="product_price" value="{{ $product->product_price }}">

                            @error('product_price')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        @if ($errors->any())
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                        <div>
                            <label for="product_quantity"> Quantity </label>
                            <br>
                            <input id="product_quantity" type="number"
                                class=" @error('product_quantity') 
                                                                                                                is-invalid @enderror" name="product_quantity"
                                autocomplete="product_quantity" value="{{ $product->product_quantity }}">

                            @error('product_quantity')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="container">
                            <label for="product_mainphoto">Update Main Photo for this product</label>
                            <div>
                                <input type="file" name="product_mainphoto" id="product_mainphoto"
                                    accept="image/x-png ,image/jpeg" multiple>

                            </div>

                            <img style="width: 25rem; height:25rem"
                                src="{{ asset('/storage/' . $product->product_mainphoto) }}" alt="">
                        </div>

                        @error('product_mainphoto')
                            <span class="" role="alert">
                                <strong>Needs the main photo of the product</strong>
                            </span>
                        @enderror
                        <div class="container">
                            <label for="product_photo">add more photos of the product</label>
                            <div>
                                <input type="file" name="product_photo[]" id="product_photo[]"
                                    accept="image/x-png ,image/jpeg" multiple>
                            </div>



                        </div>

                        @foreach ($asphotos as $asp)
                            <div class="container mt-2">
                                <img src="{{ asset('/storage/' . $asp->product_photo) }}" height="120" alt="">
                                <a
                                    href="{{ route('retailer.products.removepicture', ['id' => $product->product_id, 'pic' => $asp->assigned_photoid]) }}">
                                    remove pic</a>
                            </div>
                        @endforeach

                        <div class="container text-center">
                            <button class="btn btn-dark " type="submit"> Update product</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    \
@endsection
