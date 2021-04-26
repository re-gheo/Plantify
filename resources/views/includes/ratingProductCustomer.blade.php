@if($product->rating_average)
    <h2>ITEM RATING: {{$product->rating_average}}/10</h2>
    @foreach($product->ratings as $rating)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{$rating->ratee->name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$rating->rating_type}}</h6>
                <p class="card-text">{{$rating->comment}}</p>
                {{-- <a href="#" class="card-link">HIDE</a>
                <a href="#" class="card-link">DELETE</a> --}}
            </div>
        </div>
    @endforeach
@else
<div class="p-3">
    <h6>No Rating Yet!</h6>
</div>
@endif

@if(Auth::check())
<div class="card">
    <div class="card-header">
      Rate Item
    </div>

    <div class="card-body">
        <form method="POST" action="{{route('product.rating.customer', ['id' => $product->product_id] )}}">
            @csrf
            <div class="form-group">
              <label for="ratingType">Select Rating</label>
              <select class="form-control" name="ratingType" id="ratingType">
                <option value='1'>Positive</option>
                <option value='0'>Negative</option>
              </select>
            </div>
            <div class="form-group">
              <label for="comment">Comment</label>
              <textarea class="form-control" name="comment" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@else
    <a href="">
        Sign In or Register to Rate Product
    </a>
@endif
