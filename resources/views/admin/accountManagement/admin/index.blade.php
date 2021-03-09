@extends ('layouts/admin-template')

@section('content')
<div class="page-content">
    <div class="row">
        <div class="col-lg-10 mr-auto ml-auto">

            <div class="container">

                <div class="container">
                    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4">
                        <i lass="fa fa-bars mr-2"></i>
                        <small class="text-uppercase font-weight-bold">Toggle</small>
                    </button>

                    <h3>Manage Admin Accounts</h3>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createAdminModal">
                            Create New Admin Account
                        </button>
                    </div>
                </div>
                <div class="card-body table-responsive-sm">

                    <!--SUCESS MESSAGE-->

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

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

                        @foreach ($admins as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="row justify-items-center">
                                        @if (Auth::id() != $user->id)
                                            @if($user->user_stateid != 2 || $user->user_stateid == null)
                                            <form action="{{route('admin.user.ban', ['id' => $user->id])}}" method="POST">
                                                @csrf
                                                <button class="btn btn-warning" type="submit">Ban </button>
                                            </form>
                                            @else
                                            <form action="{{route('admin.user.unban', ['id' => $user->id])}}" method="POST">
                                                @csrf
                                                <button class="btn btn-success " type="submit">Unban </button>
                                            </form>
                                            @endif
                                            <form action="{{route('admin.user.admin.delete', ['id' => $user->id])}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit">Delete </button>
                                            </form>
                                        @endif

                                        <a class="btn btn-success" href="{{route('admin.user.admin.edit', ['id' => $user->id])}}">Edit</a>
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

<div class="modal fade" id="createAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Admin Details</h5>
        </div>
        <div class="modal-body">
          <form id="createAdmin" action="{{route('admin.user.admin.store')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="fn">First Name</label>
                <input type="text" class="form-control" id="fn" name="fn" aria-describedby="fn" placeholder="Enter First Name" required>
              </div>

              <div class="form-group">
                <label for="ln">Last Name</label>
                <input type="text" class="form-control" id="ln" name="ln" aria-describedby="ln" placeholder="Enter Last Name" required>
              </div>

              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              @error('email')
              <span class="error-message pt-2" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">

                @error('password')
                <span class="error-message pt-2" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Password">
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button form="createAdmin" type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
