@extends('layouts.template')

@section('content')
    {{-- {{ dd($name) }} --}}
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class=" card-row col-md-10 border">
                {{-- <h1><b>my Profile information</b> </h1> --}}
                <div class=" row z-depth-3">
                    <div class="left-div col-sm-4  rounded-left rounded-right ">
                        <div class="card-block text-center text-white ">
                            <div class="">

                            </div>
                            <div class="text-center">
                                {{-- NAME OF USER --}}
                                <h2 class="font-weight-bold mt-4 ">{{$user->first_name. ' '. $user->last_name}} </h2>
                            </div>

                            <div class="text-center">
                                {{-- NAME OF USER --}}
                                <span class="text-gray"> <u>Date registered:{{ $user->fdate() }}</u> </span>
                            </div>


                        </div>

                        <div class="card-block text-center text-white mt-4">

                            <div class="text-center"><H3>Options</H3></div>
                            <br>
                            @if (true)

                                <div class="text-center">
                                    {{-- NAME OF USER --}}
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="fas fa-stop"></i> Block
                                    </button>
                                </div>

                              

                                <div class="card-block text-center mt-4">
                                    <button type="button" class="btn btn-success text-white ml-2">
                                        <i class="fas fa-search"></i> <a class="text-white" href="">Verify</a>
                                    </button>

                                </div>

                                <div class="card-block text-center mt-4">
                                    <button type="button" class="btn btn-warning text-dark ml-2">
                                        <i class="fas fa-search"></i> <a class="text-dark" href="">Unverify</a>
                                    </button>

                                </div>
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
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Remarks</label>
                                            <textarea class="form-control" name="remarks" id="exampleFormControlTextarea1"
                                                rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button form="banForm" class="btn btn-primary" type="submit">Confirm Block</button>
                                    </div>
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
                                    {{-- @if (!$profile->cp_number)
                                        <p>Please register and verify for cellphone number </p>
                                    @else
                                        <p>{{ $profile->cp_number }}</p>
                                    @endif --}}
                                </h6>
                            </div>
                        </div>
                        <h4 class="mt-3">Other Information</h4>
                        <hr class="bg-primary">
                        <div class="row">
                            <div class="col-sm-6">
                                {{-- BIRTHDAY --}}
                                <p class="font-weight-bold">Birthday</p>
                                <h6 class="text-muted">
                                    {{-- @if (!$profile->birthday)
                                        <p>Please register birthday at settings</p>
                                    @else
                                        <p>{{ $profile->birthday }}</p>
                                    @endif --}}
                                   
                                     <p>{{ $user->birthday }}</p>
                                </h6>
                            </div>

                            <div class="col-sm-6">
                                {{-- GOVT ID --}}
                                <p class="font-weight-bold">Govt ID</p>
                                <h6 class="text-muted">
                                    {{-- @if (!$profile->govtid_number)
                                        <p>Please register Government id here</p>
                                    @else
                                        <p>{{ $profile->govID->type . '-' . $profile->govID->no }}</p>
                                    @endif --}}
                                   {{$user->govtid_number}}
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
                                    {{-- @if (!$profile->address)
                                        <h6 class="">Please register a location for us to deliver the package</h6>
                                    @else
                                        <p>{{ $profile->address }}</p>
                                    @endif --}}
                                </h5>
                            </div>
                        </div>

                        {{-- REMARKS GOES HERE --}}
                        <p class="font-weight-bold">Current Remarks for User</p>
                        <div class="row">
                            <div class="col-sm-10 w-100">
                                <h5 class="text-muted">
                                    {{ $user->remarks }}
                                    {{-- @if (!$profile->address)
                                        <h6 class="">Please register a location for us to deliver the package</h6>
                                    @else
                                        <p>{{ $profile->address }}</p>
                                    @endif --}}
                                </h5>
                            </div>
                        </div>
                        {{-- ADDRESS GOES HERE --}}
                        <div class="card-body">
                            {{-- @if (!$profile->cp_number || !$profile->govtid_number || !$profile->birthday || !$profile->address)

                                <p><b>To Register as a Retailer in our site please complete my credentials and verify your
                                        Cellphone
                                        number</b></p>
                            @else

                                @if (!$profile->retailer_approvalstateid)
                                    <a href="{{ route('customer.application.show') }}"> Regsiter as a Retailer </a>
                                @elseif($profile->retailer_approvalstateid == 2)
                                    <a href="{{ route('customer.application.show') }}"> Regsiter as a Retailer</a>
                                    <div>
                                        <b>
                                            <p>my last application was denied!, you may try again.</p>
                                        </b>
                                        <b>
                                            <p> Status of the application was denied because:</p>
                                        </b>
                                        @if (isset($app->deny_reason))
                                            <ol>

                                                {!! $app->deny_reason !!}
                                            </ol>
                                        @endif
                                    </div>
                                @elseif($profile->retailer_approvalstateid == 1)
                                    <div>
                                        <p>You are registered as retailer</p>
                                    </div>
                                @else
                                    <p><b>[Retailer Appliaction] already Sent and Awaiting Approval from Admins, Please wait
                                            atleast 5 working days.
                                            hours.</b></p>
                                @endif
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
