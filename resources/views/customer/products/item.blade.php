@extends('layouts.template')

@section('content')
    @if (!Auth::user())
    @else
        @if ($product->product_id == Auth::user()->id)
            <b>I own this Product</p>
                <a href="{{ route('retailer.products.front') }}" class="btn btn-dark"> Go to my product list</a>
        @endif
    @endif

    @if (!Auth::user())
    @else
        @if ($product->retailer_id == Auth::user()->id)

            <a class="btn btn-dark" href=" {{ route('retailer.products.edit', ['id' => $product->product_id]) }}"> edit products</a>
        @endif
    @endif

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
                    <img src="{{ asset('/storage/' . $product->product_mainphoto) }}" alt="">
                </div>

                @foreach ($asphotos as $asp)
                    <div class="carousel-item">
                        <img src="{{ asset('/storage/' . $asp->product_photo) }}" alt="">
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
        <h4>{{ $product->product_name }}</h4><br> <br>

        <h3><b>Store</b></h3><br>
        <h4>
            <a href="{{route('retailer.store.front', ['id' => $product->retailer->retailer_id])}}">{{$product->retailer->store->store_name }}</a>
        </h4><br> <br>

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
        <p>{{ $product->price }} <b>PHP</b></p><br> <br>

        <h3><b>Current Stocks</b></h3><br>
        <p>{{ $product->product_quantity }} <b> Items</b></p><br> <br>





        <br>
        <br>
        <br>
        <br>
        <br>
        <h2><b>COMMENTS</b></h2>
        <br>
        <br>
        <h2><b>QUESTIONS</b></h2>

        @if(Auth::check())
            <form method="POST" action="{{route('customer.inquiry.store', ['id' => $product->product_id] )}}">
                @csrf
                <input type="text" name="inquiry" placeholder="Ask A Question">
            </form>
        @else
            <a href="">
                Sign In or Register
            </a>
        @endif

        @if($product->inquiry->count() > 0)
            @foreach($product->inquiry as $inquiry)
                <div class="card">
                    @if(!$inquiry->trashed())
                        <p>{{$inquiry->inquiry}}</p>
                        @if($inquiry->rater_id == Auth::id())
                            <form method="POST" action="{{route('customer.inquiry.delete', ['id' => $inquiry->id] )}}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn-danger"> Delete</button>
                            </form>
                        @endif
                    @else
                        User Deleted This Inquiry
                    @endif
                </div>

                <ul class="ml-5 list-group">
                    @foreach ($inquiry->comments as $comment)
                        <li class="list-group-item">{{$comment->comment}}</li>
                        @if($comment->inquiry->rater_id == Auth::id())
                            <form method="POST" action="{{route('customer.inquiry.best', ['id' => $comment->id] )}}">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="btn-success">Mark As Best Answer</button>
                            </form>
                         @endif
                    @endforeach
                </ul>
            @endforeach
        @else
            <h6>No Inquires! Ask Now!</h6>
        @endif


        <br>
        <br>
        <br>
        <br>
    </div>






@endsection
