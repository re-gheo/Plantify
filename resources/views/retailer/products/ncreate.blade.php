@extends ('layouts/template')

@section('content')

    <div class="container">
        <div class="row px-2">
            <div class="col-lg-8 col-xl-6 card flex-row mx-auto px-4 shadow p-3 mb-5 border-3">
                <div class="card-body mx-auto">
                    <h1> Add Product</h1>

                    <form action="{{ route('retailer.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-input">
                            <label for="product_name"> Name of the Product </label>
                            <br>
                            <input id="product_name" type="text" class=" @error('product_name') 
                                                                                                    is-invalid @enderror"
                                name="product_name" autocomplete="product_name">

                            @error('product_name')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-input">
                            <label for="product_description"> Description of the product </label>
                            <br>
                            <textarea id="product_description"
                                class="txtarea @error('product_description') 
                                                                                                            is-invalid @enderror"
                                name="product_description" autocomplete="product_description" cols="30"
                                rows="10"></textarea>

                            @error('product_description')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>




                        <br>


                        <div class="d-flex">
                            <div class="">
                                <label for="">TAGS</label> <br>
                                @foreach ($keys as $key)
                                    <label for="keywords">{{ $key->keyword_name }}</label>
                                    <input type="checkbox" name="keywords[]" value="{{ $key->keyword_id }}" />
                                @endforeach
                            </div>
                        </div>



                        @error('keywords')
                            <span class="" role="alert">
                                <strong>{{ $message }} : At least 1 keyword required</strong>
                            </span>
                        @enderror

                        <label for="commission_id">Product Type</label>
                        <br>
                        <select name="commission_id" id="commission_id">
                            @foreach ($com as $c)
                                <option value="{{ $c->commission_id }}">{{ $c->commissiontype }}</option>
                            @endforeach
                        </select>

                        @error('commission_id')
                            <span class="" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-input">
                            <label for="product_price"> Price </label>
                            <br>
                            <input id="product_price" type="number" class=" @error('product_price') 
                                                                                                    is-invalid @enderror"
                                name="product_price" autocomplete="product_price">

                            @error('product_price')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-input">
                            <label for="product_quantity"> Quantity </label>
                            <br>
                            <input id="product_quantity" type="number" class=" @error('product_quantity') 
                                                                                                    is-invalid @enderror"
                                name="product_quantity" autocomplete="product_quantity">

                            @error('product_quantity')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div>
                            <label for="product_mainphoto">Main Photo for this Product</label>
                            <div>
                                <input type="file" name="product_mainphoto" id="product_mainphoto"
                                    accept="image/x-png ,image/jpeg" multiple>
                            </div>
                        </div>

                        @error('product_mainphoto')
                            <span class="" role="alert">
                                <strong>Needs the main photo of the product</strong>
                            </span>
                        @enderror
                        <div>
                            <label for="product_photo">multiple photos</label>
                            <div>
                                <input type="file" name="product_photo[]" id="product_photo[]"
                                    accept="image/x-png ,image/jpeg" multiple>
                            </div>
                        </div>



                        <button class="btn btn-block btn-success text-uppercase" type="submit"> Add this product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
