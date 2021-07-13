@extends('layouts.admin-template')

@section('content')
    {{-- {{ dd($name) }} --}}
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class=" card-row col-md-10 border">
                {{-- <h1><b>my Profile information</b> </h1> --}}
                <div class=" row z-depth-3">
                    <div class="left-div2 col-sm-4  rounded-left rounded-right ">
                        <div class="card-block text-center text-white ">
                            <div class="">

                            </div>
                            <div class="text-center">
                                {{-- NAME OF USER --}}
                                <h2 class="font-weight-bold mt-4 ">{{ $user->first_name . ' ' . $user->last_name }} </h2>
                            </div>

                            <div class="text-center">
                                {{-- NAME OF USER --}}
                                <span class="text-gray"> <u>Date registered:{{ $user->fdate() }}</u> </span>
                            </div>


                        </div>

                        <div class="card-block text-center text-white mt-4">

                            <div class="text-center">
                                <H3>Options</H3>
                            </div>
                            <br>
                            @if (true)
                                @if ($user->user_stateid != 4)
                                    <div class="text-center">
                                        {{-- NAME OF USER --}}
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <i class="fas fa-stop"></i> Change user State to BLOCKED or UNBLOCKED
                                        </button>
                                    </div>
                                @endif

<<<<<<< Updated upstream
=======
                                <div class="text-center">
                                    {{-- NAME OF USER --}}
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="fas fa-stop"></i> Block
                                    </button>
                                </div>


>>>>>>> Stashed changes


                                @if ($user->user_stateid == 4)
                                    <div class="card-block text-center mt-4">
                                        <button type="button" class="btn btn-success text-white ml-2">
                                            <i class="fas fa-search"></i> <a class="text-white" href="{{ route('admin.user.verifyprofile', $user->id) }}">Verify User</a>
                                        </button>

                                    </div>

                                    <form action="{{ route('admin.user.dismissprofile', $user->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="card-block text-center mt-4">
                                            <button type="submit" class="btn btn-warning text-dark ml-2">
                                                <i class="fas fa-search"></i> <p class="text-dark">Deny User</p>
                                            </button>
                                            <p class="text-white">with remarks</p>
                                            <textarea name="remark" ></textarea >
                                        </div>
                                    </form>
                                @endif
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ban this user?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                        </button>
                                    </div>

                                    @if ($user->user_role == 1)
                                        <form action="{{ 'admin.user.ban', $user->id }}" method="post">

                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Remarks</label>
                                                    <textarea class="form-control" name="remarks"
                                                        id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button form="banForm" class="btn btn-primary" type="submit">Confirm
                                                    Block</button>
                                            </div>
                                        </form>

                                    @else
                                        <form action="{{ 'admin.user.unban', $user->id }}" method="post">

                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Remarks</label>
                                                    <textarea class="form-control" name="remarks"
                                                        id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button form="banForm" class="btn btn-primary" type="submit">Confirm
                                                    Block</button>
                                            </div>
                                        </form>

                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- </form> --}}
                    @else

                        <form action="#" method="POST">
                            @csrf


                            <button class="btn btn-success " type="submit">Unblock</button>
                        </form>
                        @endif

                        <!-- END OF Modal -->


                    </div>
                    <div class="col-sm-8 bg-white rounded-right">
                        <h3 class="mt-3 text-center">Inspect User</h3>
                        <hr class="bg-primary mt-0 w-25">
                        <div class="row">
                            <div class="col-sm-6">
                                {{-- EMAIL --}}
                                <p class="font-weight-bold">Email:</p>
                                <h6 class=" text-muted">{{ $user->email }}</h6>
                            </div>
                            <div class="col-sm-6">
                                {{-- PHONE NUMBER HERE --}}
                                <p class="font-weight-bold">Phone:</p>
                                <h6 class="text-muted">
                                    {{ $user->checkno() }}
<<<<<<< Updated upstream

=======
                                    {{-- @if (!$profile->cp_number)
                                        <p>Please register and verify for cellphone number </p>
                                    @else
                                        <p>{{ $profile->cp_number }}</p>
                                    @endif --}}
>>>>>>> Stashed changes
                                </h6>
                            </div>
                        </div>
                        <h4 class="mt-3">Other Information</h4>
                        <hr class="bg-primary">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Birthday</p>
                                <h6 class="text-muted">
<<<<<<< Updated upstream

=======
                                    {{-- @if (!$profile->birthday)
                                        <p>Please register birthday at settings</p>
                                    @else
                                        <p>{{ $profile->birthday }}</p>
                                    @endif --}}
>>>>>>> Stashed changes

                                    <p>{{ $user->birthday }}</p>
                                </h6>
                            </div>

                            <div class="col-sm-6">
                                {{-- GOVT ID --}}
                                <p class="font-weight-bold">Govt ID</p>
                                <h6 class="text-muted">
<<<<<<< Updated upstream

                                    {{ $user->govtid_number }}
=======
                                    {{-- @if (!$profile->govtid_number)
                                        <p>Please register Government id here</p>
                                    @else
                                        <p>{{ $profile->govID->type . '-' . $profile->govID->no }}</p>
                                    @endif --}}
                                    {{ $user->govtid()->type }}
                                    {{ $user->govtid()->no }}
>>>>>>> Stashed changes
                                </h6>
                            </div>
                        </div>
                        <hr class="bg-primary font-weight-bold">
                        {{-- ADDRESS GOES HERE --}}
                        <p class="font-weight-bold">Address</p>
                        <div class="row">
                            <div class="col-sm-10 w-100">
                                <h5 class="text-muted">
                                    {{ $user->address }}

                                </h5>
                            </div>
                        </div>


                        <p class="font-weight-bold">Current Remarks for User</p>
                        <div class="row">
                            <div class="col-sm-10 w-100">
                                <h5 class="text-muted">
                                    {{ $user->remarks }}

                                </h5>
                            </div>
                        </div>
                        {{-- ADDRESS GOES HERE --}}
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
