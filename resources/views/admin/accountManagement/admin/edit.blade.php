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

                    <h3>Edit {{$admin->name}} Account</h3>
                </div>
                <div class="card-body table-responsive-sm">

                    <!--SUCESS MESSAGE-->

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div >
                        <form id="updateAdmin" action="{{route('admin.user.admin.update', ['id' => $admin->id])}}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="fn">First Name</label>
                              <input type="text" class="form-control" id="fn" name="fn" aria-describedby="fn" value="{{$admin->first_name}}" placeholder="Enter First Name" required>
                            </div>

                            <div class="form-group">
                              <label for="ln">Last Name</label>
                              <input type="text" class="form-control" id="ln" name="ln" aria-describedby="ln" value="{{$admin->last_name}}" placeholder="Enter Last Name" required>
                            </div>

                            <div class="form-group">
                              <label for="email">Email address</label>
                              <input type="email" class="form-control" id="email" name="email" value="{{$admin->email}}" aria-describedby="email" placeholder="Enter email">
                              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            @error('email')
                            <span class="error-message pt-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            {{-- <div class="form-group">
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
                            </div> --}}
                        </form>

                        <button form="updateAdmin" type="submit" class="btn btn-primary">Update Changes</button>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


@endsection
