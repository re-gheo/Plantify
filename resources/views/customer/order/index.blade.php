@extends ('layouts/template')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class=" card-row col-md-10 border">
                <h1 class="mt-2">
                    <b>My Orders</b>
                </h1>
                <div class=" row z-depth-3">
                    <div class="left-div col-sm-4  rounded-left">
                        @if ($orders->count() != 0)
                            @foreach($orders as $order)
                                <nav>
                                    Order Details
                                </nav>
                            @endforeach
                        @else
                            <h2 class="font-weight-bold mt-4 "> You have no pending orders. </h2>
                        @endif

                    </div>

                    <div class="col-sm-8 bg-white rounded-right">
                        <h3 class="mt-3 text-center">Order Details</h3>
                        <hr class="bg-primary mt-0 w-25">

                        <div class="row">
                            <div class="text-right">
                                <button class="btn-success">Approved</button>
                                <button class="btn-warning">Cancel Order</button>
                                <button class="btn-danger">Request Refund / Report Issue</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
