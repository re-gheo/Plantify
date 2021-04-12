@extends ('layouts/admin-template')

@section('content')

    <div class="page-content p-5" id="content">
        <h3 class=" ">Applications</h3>
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="col-md-10">
                <table class="table table-bordered table-striped table-hover ">
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
                                <a href="{{ route('admin.customer_application.show', ['id' => $app->retailer_applicationid]) }}"
                                    class="btn btn-dark">Check</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>



        {{-- END OF NEW CONTENT --}}


    </div>
    <div>


    </div class="absolute-center">


    </div>

@endsection
