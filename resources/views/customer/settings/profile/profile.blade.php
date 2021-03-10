@extends ('layouts/template')

@section('content')


    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class=" card-row col-md-10 border">
                {{-- <h1><b>my Profile information</b> </h1> --}}
                <div class=" row z-depth-3">
                    <div class="left-div col-sm-4  rounded-left rounded-right ">
                        <div class="card-block text-center text-white">

                            <div class="div">
                                <img class="avatar text-center" src="{{ Auth::user()->avatar }}"
                                    alt="{{ Auth::user()->name }} "
                                    onerror="this.onerror=null;this.src='/css/default-image.svg' ;">
                            </div>


                            <div class="text-center">
                                <h2 class="font-weight-bold mt-4 "> {{ $profile->name }} </h2>
                            </div>

                            <p>{{ $profile->user_role }}</p><a href="/settings/profile/edit"><i
                                    class="far fa-edit fa-2x mb-4 mt-4 text-white"></i> <span class="text-white">Update
                                    Profile</span>
                                <p></p>
                                <a href="/settings/profile/verify">
                                    <span class="text-white">
                                        @if (!$profile->cp_number)
                                            <p class="font-weight-bold">Register my Phone Number Via SMS</p>
                                        @else
                                            <p>Update My Phone Number</p>
                                        @endif
                                    </span>

                        </div>
                        </a>
                    </div>
                    <div class="col-sm-8 bg-white rounded-right">
                        <h3 class="mt-3 text-center">My Profile</h3>
                        <hr class="bg-primary mt-0 w-25">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Email:</p>
                                <h6 class=" text-muted">{{ $profile->email }}</h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Phone:</p>
                                <h6 class="text-muted">
                                    @if (!$profile->cp_number)
                                        <p>Please register and verify for cellphone number </p>
                                    @else
                                        <p>{{ $profile->cp_number }}</p>
                                    @endif





                                </h6>
                            </div>
                        </div>
                        <h4 class="mt-3">Other Information</h4>
                        <hr class="bg-primary">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Birthday</p>
                                <h6 class="text-muted">
                                    @if (!$profile->birthday)
                                        <p>Please register birthday at settings</p>
                                    @else
                                        <p>{{ $profile->birthday }}</p>
                                    @endif
                                </h6>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Govt ID</p>
                                <h6 class="text-muted">
                                    @if (!$profile->govtid_number)
                                        <p>Please register Government id here</p>
                                    @else
                                        <p>{{ $profile->govtid_number }}</p>
                                    @endif
                                </h6>
                            </div>
                        </div>
                        <hr class="bg-primary font-weight-bold">

                        <p class="font-weight-bold">Address</p>
                        <div class="row">
                            <div class="col-sm-10 w-100">
                                <h5 class="text-muted">
                                    @if (!$profile->address)
                                        <h6 class="">Please register a location for us to deliver the package</h6>
                                    @else
                                        <p>{{ $profile->address }}</p>
                                    @endif
                                </h5>
                            </div>
                        </div>

                        <div class="card-body">
                            @if (!$profile->cp_number || !$profile->govtid_number || !$profile->birthday || !$profile->address)

                                <p><b>To Register as a Retailer in our site please complete my credentials and verify your
                                        Cellphone
                                        number</b></p>
                            @else

                                @if (!$profile->retailer_approvalstateid)
                                    <a href="/settings/application/form"> Regsiter as a Retailer </a>
                                @elseif($profile->retailer_approvalstateid == 3)
                                    <a href="/settings/application/form"> Regsiter as a Retailer</a>
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
                                @elseif($profile->retailer_approvalstateid == 2)
                                    <div>
                                        <p>You are registered as retailer</p>
                                    </div>
                                @else
                                    <p><b>[Retailer Appliaction] already Sent and Awaiting Approval from Admins, Please wait
                                            atleast 5 working days.
                                            hours.</b></p>

                                @endif
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class=" card-row col-md-10 mt-5 pt-5 border">
                <a href="/store/profile/paymentmethods"> my payment methods</a>
            </div>
        </div>
    </div>


    <br>

    <br>
    <br>
    <br>
    <br>
    <br>

@endsection
