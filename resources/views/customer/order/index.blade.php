@extends ('layouts/template')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class=" card-row col-md-10 border">
                <h1 class="mt-2">
                    <b>My Orders</b>
                </h1>

                <div class="row">
                    <div class="col-3">
                      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @if ($orders->count() != 0)
                            @foreach($orders as $order)
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                            @endforeach
                        @else
                            <h2 class="font-weight-bold mt-4 "> You have no pending orders. </h2>
                        @endif

                      </div>
                    </div>
                    <div class="col-9">
                        <h3 class="mt-3 text-center">Order Details</h3>
                        <hr class="bg-primary mt-0 w-25">

                        <div class="tab-content" id="v-pills-tabContent">
                            @foreach ($orders as $order)
                                <div class="tab-pane fade @if ($loop->first)show active @endif"" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <button class="btn btn-success">Order Recieved</button>
                                    <button class="btn btn-warning">Cancel Order</button>
                                    <button class="btn btn-danger">Request Refund / Report Issue</button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
