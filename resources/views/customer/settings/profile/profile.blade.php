@extends ('layouts/template')

@section('content')



    <div class="bg-light">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 mt-5 pt-5">
                    <div class="row z-depth-3">

                        <!--LEFT SIDE-->
                        <div class="col-sm-4 bg-success rounded-left ">
                            <div class="card-block text-center text-white">
                                @if(isset(Auth::user()->avatar))
                                <img src="{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}" 
                                style="border: 1px solid #cccccc; border-radius: 5px; width: 4rem; height: auto; float: left; margin-right: 7px;">
                                @endif
                                <h2 class="font-weight-bold mt-4">   <p>{{ $profile->name }}</p></h2>
                                <p>{{ $profile->user_role }}</p>
                                <a class="" href="/settings/profile/edit"><i class=" far fa-edit fa-2x mb-4 text-white"></i></a>
                            </div>
                        </div>

                          <!--RIGHT SIDE-->
                        <div class="col-sm-8 bg-info rounded-right">
                            <h3 class="mt-3 text-center text-white">information</h3>
                            <hr class="badge-primary mt-0 w-25 bg-white">
                            <div class="row">
                                <p class="font-weight-bold text-white">Email:  </p>
                                <h6 class="text-white">{{ $profile->email }}</h6>
                            </div>

                            <div class="col-sm-6">
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <h1><b>Your Profile information</b> </h1>

    <div>
        <div>
            <label for=""><b>Your Email Address</b></label>
            <div>
                <p>{{ $profile->email }}</p>
            </div>
        </div>

    </div>

    <div>
        <div>
            <label for=""><b>Your Name</b></label>
            <div>
                <p>{{ $profile->name }}</p>
            </div>
        </div>

    </div>

    <div>
        <div>
            <label for=""><b>Your Adress for delivery</b></label>
            <div>

                @if (!$profile->address)
                    <p>Please register a location for us to deliver the package</p>
                @else
                    <p>{{ $profile->address }}</p>
                @endif
            </div>
        </div>

    </div>

    <div>
        <div>
            <label for=""><b>Your Government id</b></label>
            <div>

                @if (!$profile->govtid_number)
                    <p>Please register Government id here</p>
                @else
                    <p>{{ $profile->govtid_number }}</p>
                @endif
            </div>
        </div>

    </div>

    <div>
        <div>
            <label for=""><b>Birthday</b></label>
            <div>
                @if (!$profile->birthday)
                    <p>Please register birthday at settings</p>
                @else
                    <p>{{ $profile->birthday }}</p>
                @endif
            </div>
        </div>

    </div>

    <div>
        <div>
            <label for=""><b>Cellphone Number </b></label>
            <div>

                @if (!$profile->cp_number)
                    <p>Please register and verify a Cellphone number </p>
                @else
                    <p>{{ $profile->cp_number }}</p>
                @endif
            </div>
        </div>

    </div>
    <div>
        <a href="/settings/profile/edit">Update My Profile</a>
    </div>
    <div>
        <a href="/settings/profile/verify">


            @if (!$profile->cp_number)
                <p>Register Your Phone Number Via SMS</p>
            @else
                <p>Update My Phone Number</p>
            @endif
        </a>
    </div>

    <div>
        @if (!$profile->cp_number || !$profile->govtid_number || !$profile->birthday || !$profile->address)

            <p><b>To Register as a Retailer in our site please complete your credentials and verify your Cellphone
                    number</b></p>
        @else

            @if (!$profile->retailer_approvalstateid)
                <a href="/settings/application/form"> Regsiter as a Retailer </a>
            @elseif($profile->retailer_approvalstateid == 3)
                <a href="/settings/application/form"> Regsiter as a Retailer</a>
                <div>
                    <b>
                        <p>your last application was denied!, you may try again.</p>
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
                <p><b>[Retailer Appliaction] already Sent and Awaiting Approval from Admins, Please wait atleast 5 working days.
                        hours.</b></p>

            @endif
        @endif


    </div>


@endsection
