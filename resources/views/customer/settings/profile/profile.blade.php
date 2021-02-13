@extends ('layouts/template')

@section ('content')




<h1><b>Your Profile information</b>  </h1>

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
           
            @if(!$profile->address)
            <p>Please register a location for us to deliver the package</p>
            @else
            <p>{{ $profile->address}}</p>
            @endif
        </div>
    </div>

</div>

<div>
    <div>
        <label for=""><b>Your Government id</b></label>
        <div>
           
            @if(!$profile->govtid_number)
            <p>Please register Government id here</p>
            @else
            <p>{{ $profile->govtid_number}}</p>
            @endif
        </div>
    </div>

</div>

<div>
    <div>
        <label for=""><b>Birthday</b></label>
        <div>
            @if(!$profile->birthday)
            <p>Please register birthday at settings</p>
            @else
            <p>{{ $profile->birthday}}</p>
            @endif
        </div>
    </div>

</div>

<div>
    <div>
        <label for=""><b>Cellphone Number </b></label>
        <div>
            
            @if(!$profile->cp_number)
            <p>Please register and verify a Cellphone number </p>
            @else
            <p>{{ $profile->cp_number}}</p>
            @endif
        </div>
    </div>

</div>
<div>
    <a href="/settings/profile/edit">Edit Your Profile</a>
</div>
<div>
    <a href="/settings/profile/verify">
        
       
        @if(!$profile->cp_number)
        <p>Register Your Phone Number Via SMS</p>
        @else
        <p>Update Phone Number</p>
        @endif
    </a>
</div>

<div>         
        @if(!$profile->retailer_approvalstateid )
                <a href="/settings/profile/verify"> Regsiter as a Retailer </a>
        @elseif($profile->retailer_approvalstateid == 2)
                <a href="/settings/profile/verify"> Regsiter as a Retailer</a>
                    <div>
                        <p>your last application was denied, you may try again.</p>
                    </div>
        @else
                <p>[Retailer Appliaction] already Sent and Awaiting Approval.</p>
                
        @endif
   
</div>







@endsection