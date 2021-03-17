@extends('layouts.template')

@section('content')

    <div class="container">

        <br>

        <div class="card">
            <div class="row">

                <aside class="col-sm-5 border-right">
                    <article class="gallery-wrap">
                        <div class="img-big-wrap">
                            <div>
                                <a href="#"> <img style="height:20rem; width:28rem"
                                        src="{{ asset('/storage/' . $product->product_mainphoto) }}" alt=""></a>
                            </div>
                        </div> <!-- slider-product.// -->
                        {{-- <div class="img-small-wrap">
                            <div class="item-gallery"><img src="https://s9.postimg.org/tupxkvfj3/image.jpg"></div>
                            <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
                            <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
                            <div class="item-gallery"> <img src="https://s9.postimg.org/tupxkvfj3/image.jpg"> </div>
                        </div> <!-- slider-nav.// --> --}}
                    </article> <!-- gallery-wrap .end// -->
                </aside>
                <aside class="col-sm-7">
                    <article class="card-body p-5">
                        <h3 class="title mb-3 font-weight-bold">{{ $product->product_name }}</h3>

                        <p class="price-detail-wrap">
                            <dt>Price</dt>
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
                            <p>{{ $product->product_sizes }}</p><br> <br>
                            {{-- @endif --}}
                        </dl> <!-- item-property-hor .// -->
                        <dl class="param param-feature">
                            <pt><b>Scientific Name</b></pt><br>
                            <p>{{ $product->plant_scientificname }}</p><br> <br>
                        </dl> <!-- item-property-hor .// -->
                        <dl class="param param-feature">
                            <pt><b>Stocks available</b></pt><br>
                            <p>{{ $product->product_quantity }} <b> Items</b></p> <br> <br>
                        </dl> <!-- item-property-hor .// -->

                        <div class="conatiner">
                            <div class="row">
                                <a href="{{ route('retailer.products.front') }}" class="btn btn-dark mb-2 mt-2 m-1">
                                    <i class="fas fa-list"></i> Back to my product list</a>

                                <a class="btn btn-success mb-2 mt-2 m-1"
                                    href="{{ route('retailer.products.edit', ['id' => $product->product_id]) }}">
                                    <i class="fas fa-edit"></i> Edit product</a>
                            </div>
                        </div>

                    </article> <!-- card-body.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- card.// -->


    </div>
    <!--container.//-->








    <!--OLD CODE.//-->






    </div>

@endsection
