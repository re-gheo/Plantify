@extends ('layouts/admin-template')

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-lg-10 mr-auto ml-auto">
                <div class="container">
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>options</th>
                            </tr>
                        </thead>

                        <!--TABLE-->

                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <div class="row justify-items-center">
                                        @if (Auth::id() != $user->id)
                                            @if ($user->user_stateid != 2 || $user->user_stateid == null)
                                                <form id="banForm" action="{{ route('admin.user.ban', ['id' => $user->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                       Block
                                                    </button>

                                                      <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <h5 class="modal-title" id="exampleModalLabel">Block {{$user->name}}</h5>
                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                                              </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">Remarks</label>
                                                                    <textarea class="form-control" name="remarks" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                                  </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                              <button form="banForm" class="btn btn-primary" type="submit">Confirm Block</button>
                                                            </div>
                                                          </div>
                                                        </div>
                                                    </div>
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
@endsection
