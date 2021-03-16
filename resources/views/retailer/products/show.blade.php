@extends('layouts.template')

@section('content')

    <div class="container">
        <a href="{{ route('retailer.products.front') }}" class="btn btn-dark mb-2 mt-2"> Back to my product list</a>
        <br>

        <div class="card">
            <div class="row">

                <aside class="col-sm-5 border-right">
                    <article class="gallery-wrap">
                        <div class="img-big-wrap">
                            <div>
                                <a href="#"> <img src="{{ url('/storage/' . $product->product_mainphoto) }}" alt=""></a>
                            </div>
                        </div> <!-- slider-product.// -->
                        <div class="img-small-wrap">
                            <div class="item-gallery">
                                <img src="https://s9.postimg.org/tupxkvfj3/image.jpg">
                            </div>
                            <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
                            <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
                            <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
                        </div> <!-- slider-nav.// -->
                    </article> <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-7">
                    <article class="card-body p-5">
                        <h3 class="title mb-3">{{ $product->product_name }}</h3>

                        <p class="price-detail-wrap">
                            <span class="price h2 text-success font-weight-bold ">
                                <span class="currency">₱</span><span class="num">{{ $product->product_price }}</span>
                            </span>

                        </p> <!-- price-detail-wrap .// -->
                        <dl class="item-property">
                            <dt>Description</dt>
                            <dd>
                                <p>{{ $product->product_description }} </p>
                            </dd>
                        </dl>
                        <dl class="param param-feature">
                            {{-- @if (isset($product->product_sizes)) --}}
                            <dt><b>Size of the plant</b></dt><br>
                            <p>{{ $product->product_sizes }} inches</p><br> <br>
                            {{-- @endif --}}
                        </dl> <!-- item-property-hor .// -->
                        <dl class="param param-feature">
                            <pt><b>the Plants scientific Name</b></pt><br>
                            <p>{{ $product->plant_scientificname }}</p><br> <br>
                        </dl> <!-- item-property-hor .// -->
                        <dl class="param param-feature">
                            <dt>Delivery</dt>
                            <dd>Russia, USA, and Europe</dd>
                        </dl> <!-- item-property-hor .// -->

                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                                <dl class="param param-inline">
                                    <dt>Quantity: </dt>
                                    <dd>
                                        <select class="form-control form-control-sm" style="width:70px;">
                                            <option> 1 </option>
                                            <option> 2 </option>
                                            <option> 3 </option>
                                        </select>
                                    </dd>
                                </dl> <!-- item-property .// -->
                            </div> <!-- col.// -->
                            <div class="col-sm-7">
                                <dl class="param param-inline">
                                    <dt>Size: </dt>
                                    <dd>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio2" value="option2">
                                            <span class="form-check-label">SM</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio2" value="option2">
                                            <span class="form-check-label">MD</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio2" value="option2">
                                            <span class="form-check-label">XXL</span>
                                        </label>
                                    </dd>
                                </dl> <!-- item-property .// -->
                            </div> <!-- col.// -->
                        </div> <!-- row.// -->
                        <hr>
                        <a href="#" class="btn btn-lg btn-primary text-uppercase"> Buy now </a>
                        <a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i
                                class="fas fa-shopping-cart"></i> Add to cart </a>
                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->


    </div>
    <!--container.//-->








    <!--OLD CODE.//-->

    <a href="{{ route('retailer.products.front') }}" class="btn btn-dark"> back to my product list</a>
    <div class="container mt-2">
        <div id="pic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#pic" data-slide-to="0" class="active"></li>

                <?php $i = 1; ?>

                @foreach ($asphotos as $asp)
                    <li data-target="#pic" data-slide-to="{{ $i++ }}" class="active"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active ">
                    <img src="{{ url('/storage/' . $product->product_mainphoto) }}" alt="">
                </div>

                @foreach ($asphotos as $asp)
                    <div class="carousel-item">
                        <img src="{{ url('/storage/' . $asp->product_photo) }}" alt="">
                    </div>
                @endforeach


            </div>

            <hr>

            <a class="carousel-control-prev" href="#pic" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon dark-gray" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#pic" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container mt-2">

        <h3><b>Product Name</b></h3><br>
        <p>{{ $product->product_name }}</p><br> <br>

        <h3><b>Product Description</b></h3><br>
        <p>{{ $product->product_description }}</p><br> <br>

        @if (isset($product->product_sizes))
            <h3><b>Size of the plant</b></h3><br>
            <p>{{ $product->product_sizes }} inches</p><br> <br>
        @endif


        <h3><b>Keywords / Tags</b></h3><br>
        @foreach ($askeys as $ask)
            <p>: {{ $ask->keyword_name }} </p>
        @endforeach

        @if (isset($product->product_sizes))
            <h3><b>the Plants scientific Name</b></h3><br>
            <p>{{ $product->plant_scientificname }}</p><br> <br>
        @endif


        <h3><b>PRICE</b></h3><br>
        <p>{{ $product->product_price }} <b>PHP</b></p><br> <br>

        <h3><b>Current Stocks</b></h3><br>
        <p>{{ $product->product_quantity }} <b> Items</b></p><br> <br>



        <a href="{{ route('retailer.products.edit', ['id' => $product->product_id]) }}"> edit products</a>

    </div>

@endsection
