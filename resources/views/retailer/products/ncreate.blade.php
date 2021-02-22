@extends ('layouts/template')

@section('content')
    <div class="col-lg-10 mr-auto ml-auto">
        <h1> add a Product</h1>

        <form action="/store/products/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="product_name"> Name of the Product </label>
                <br>
                <input id="product_name" type="text" class=" @error('product_name') 
        is-invalid @enderror" name="product_name" autocomplete="product_name">

                @error('product_name')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div>
                <label for="product_description"> Description of the product </label>
                <br>
                <textarea id="product_description" class=" @error('product_description') 
                is-invalid @enderror" name="product_description" autocomplete="product_description" cols="30"
                    rows="10"></textarea>

                @error('product_description')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>




            <br>


            <div>
                <div>
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

            <div>
                <label for="product_price"> Price </label>
                <br>
                <input id="product_price" type="number" class=" @error('product_price') 
        is-invalid @enderror" name="product_price" autocomplete="product_price">

                @error('product_price')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <label for="product_quantity"> Quantity </label>
                <br>
                <input id="product_quantity" type="number" class=" @error('product_quantity') 
        is-invalid @enderror" name="product_quantity" autocomplete="product_quantity">

                @error('product_quantity')
                    <span class="" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <label for="product_mainphoto">Main Photo for this Product</label>
                <div>
                    <input type="file" name="product_mainphoto" id="product_mainphoto" accept="image/x-png ,image/jpeg"
                        multiple>
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
                    <input type="file" name="product_photo[]" id="product_photo[]" accept="image/x-png ,image/jpeg"
                        multiple>
                </div>
            </div>



            <button type="submit"> Add this product</button>
        </form>

    </div>

@endsection
