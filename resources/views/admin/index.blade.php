@extends('layouts/admin-template')

@section('content')
    <div id="wrapper">
        <!-- Page content holder -->
        <div class="page-content p-5" id="content">
            <!-- Toggle button -->
            <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i
                    class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle</small></button>

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
                            <b>PHP</b> 150,000.00
                        </div>
                    </div>
                </div>

                <div class="col-5 m-3 card-admin">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-store mr-2"></i>Orders</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Total Number of Orders </h6>
                        <div class="text-center">
                            <b>2</b>
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
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>options</th>
                        </tr>
                    </thead>

                    <!--TABLE-->
                    <tr>
                        <td>140</td>
                        <td>Order 1</td>
                        <td> Shipped</td>
                        <td>
                            <div class="row justify-items-center">
                                <a class="btn btn-success" href="">View More</a>
                            </div>
                        </td>
                    </tr>

                </table>
            </div>

            <h3>Commission</h3>
            <div class="card-body table-responsive-sm">


                <!--TABLE-->
                <table class="table table-bordered table-striped table-hover table-responsive-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>options</th>
                        </tr>
                    </thead>

                    <!--TABLE-->
                    <tr>
                        <td>140</td>
                        <td>Order 1</td>
                        <td> Shipped</td>
                        <td>
                            <div class="row justify-items-center">
                                <a class="btn btn-success" href="">View More</a>
                            </div>
                        </td>
                    </tr>

                </table>
            </div>

        </div>

    </div>
    <!-- End demo content -->



@endsection
