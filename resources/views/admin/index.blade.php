@extends('layouts/admin-template')

@section('content')
    <div id="wrapper">
        <!-- Page content holder -->
        <div class="page-content p-5" id="content">

            <h2 class="display-4 text-dark">Welcome to the Admin Dashboard</h2>
            {{-- <p class="lead text-dark mb-0">Choose </p> --}}

            <div class="row">
                <div class="col m-3 card-admin">
                    <div class="card-body">
                        <h5 class="card-title"> <i class="fas fa-user-alt mr-2"></i>Customers</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Number of registered customers</h6>
                        <div class="text-center">
                            <b>{{ $customers->count() }}</b>
                        </div>
                    </div>
                </div>

                <div class="col m-3 card-admin">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-store mr-2"></i>Retailers</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Number of retailers & stores</h6>
                        <div class="text-center">
                            <b>{{ $retailers->count() }}</b>
                        </div>
                    </div>
                </div>

                <div class="col m-3 card-admin">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-cog mr-2"></i>Administration</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Number of active admin</h6>
                        <div class="text-center">
                            <b>{{ $admins->count() }}</b>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-5 m-3 card-admin">
                    <div class="card-body">
                        <h5 class="card-title"> <i class="fas fa-user-alt mr-2"></i>Commission</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Commsion Earned</h6>
                        <div class="text-center">
                            <b>PHP</b> {{$commission}}
                        </div>
                    </div>
                </div>

                <div class="col-5 m-3 card-admin">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-store mr-2"></i>Orders</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Number of Orders </h6>
                        <div class="text-center">
                            <b>{{$orders->count()}}</b>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Demo content -->

            <div class="separator"></div>

            <h3>Orders</h3>
            <div class="card-body table-responsive-sm">
                <!--TABLE-->
                <table class="table table-bordered table-striped table-hover table-responsive-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th>Order ID</th>
                            <th>Status</th>
                            <th>Method</th>
                            <th>Shipping Date</th>
                        </tr>
                    </thead>

                    <!--TABLE-->
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->order_id}}</td>
                        <td>{{$order->status->order_status}}</td>
                        <td>{{$order->paymentType->payment_type}}</td>
                        <td>{{$order->order_dateshipped}}</td>
                    </tr>
                    @endforeach

                </table>
            </div>

            <h3>Commission</h3>
            <div class="card-body table-responsive-sm">
                <!--TABLE-->
                <table class="table table-bordered table-striped table-hover table-responsive-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th>Product Name</th>
                            <th>Retailer</th>
                            <th>Quantity</th>
                            <th>Total Cost</th>
                            <th>Commission</th>
                        </tr>
                    </thead>

                    <!--TABLE-->
                    @foreach ($orders_bystore as $order)
                    <tr>
                        <td>{{$order->product->product_name}}</td>
                        <td>{{$order->retailer->store->store_name}}</td>
                        <td>{{$order->order_quantity}}</td>
                        <td>{{$order->order_unitcost}}</td>
                        <td>{{$order->product->commissionearned * $order->order_quantity}}</td>
                    </tr>
                    @endforeach

                </table>
            </div>

        </div>

    </div>
    <!-- End demo content -->



@endsection
