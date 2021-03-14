@extends ('layouts/admin-template')

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-lg-10 mr-auto ml-auto">

                <div class="container">

                    <div class="container">
                        <button id="sidebarCollapse" type="button"
                            class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i
                                class="fa fa-bars mr-2"></i><small
                                class="text-uppercase font-weight-bold">Toggle</small></button>
                        <h3>Manage user accounts here</h3>
                    </div>
                    <div class="card-body table-responsive-sm">

                        <!--SUCESS MESSAGE-->

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                        <!--TABLE-->
                        <table
                            class="table table-bordered table-striped table-hover table-responsive-sm table-responsive-lg">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>options</th>
                                </tr>
                            </thead>

                            <!--TABLE-->

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="row justify-items-center">
                                            @if (Auth::id() != $user->id)
                                                @if ($user->user_stateid != 2 || $user->user_stateid == null)
                                                    <form action="{{ route('admin.user.ban', ['id' => $user->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-danger" type="submit">Block </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.user.unban', ['id' => $user->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button class="btn btn-success " type="submit">Unblock</button>
                                                    </form>
                                                @endif
                                                {{-- <form action="#" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-danger " type="submit">Lock </button>
                                            </form> --}}
                                            @endif
                                        </div>

                                    </td>
                                </tr>


                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
