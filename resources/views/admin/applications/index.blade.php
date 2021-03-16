@extends ('layouts/admin-template')

@section('content')

    <div class="row">
        <div class="col-lg-10 mr-auto ml-auto">


            <div class="container">
                <button id="sidebarCollapse" type="button"
                    class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small
                        class="text-uppercase font-weight-bold">Toggle</small></button>
                <h3 class="text-center col-md-4 ">Applications</h3>
            </div>
            <div class="div class= card-body table-responsive-sm">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-bordered table-striped table-hover  table-responsive-lg ml-5">
                    <thead class="thead-dark">
                        <tr>
                            <th>Applications ID</th>
                            <th>Email</th>
                            <th>Application status</th>
                            <th>options</th>


                        </tr>
                    </thead>
                    @foreach ($apps as $app)

                        <tr>
                            <td>{{ $app->retailer_applicationid }}</td>
                            <td>{{ $app->email }}</td>
                            <td>{{ $app->retailer_approvalstate }}</td>
                            <td>
                                <a href="{{ route('admin.customer_application.show', [ 'id' => $app->retailer_applicationid]) }}"
                                    class="btn btn-dark">Check</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

        </div>

    </div>

    </div>
    <div>


    </div class="absolute-center">


    </div>

@endsection
