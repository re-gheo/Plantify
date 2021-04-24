
@if($product->inquiry->count() > 0)
    @foreach($product->inquiry as $inquiry)
        <div class="m-2">
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
        </div>
    @endforeach
@else
<div class="p-3">
    <h6>No Inquires! Ask Now!</h6>
</div>

@endif
@if(Auth::check())

<div class="card">
    <div class="card-header">
      Ask A Question
    </div>

    <div class="card-body">
        <form method="POST" action="{{route('customer.inquiry.store', ['id' => $product->product_id] )}}">
            @csrf
            <div class="form-group">
            <label for="comment">Comment</label>
            <textarea class="form-control" name="inquiry" placeholder="Ask A Question" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@else
    <a href="">
        Sign In or Register
    </a>
@endif
