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
    <a href="/settings/profile/edit">Update My Profile</a>
</div>
<div>
    <a href="/settings/profile/verify">
        
       
        @if(!$profile->cp_number)
        <p>Register Your Phone Number Via SMS</p>
        @else
        <p>Update My Phone Number</p>
        @endif
    </a>
</div>

<div>         
    @if(!$profile->cp_number|| !$profile->govtid_number || !$profile->birthday || !$profile->address)
    
    <p><b>To Register as a Retailer in our site please complete your credentials and verify your Cellphone number</b></p>
    @else 
    
      @if(!$profile->retailer_approvalstateid )
                <a href="/settings/application/form"> Regsiter as a Retailer </a>
        @elseif($profile->retailer_approvalstateid == 2)
                <a href="/settings/application/form"> Regsiter as a Retailer</a>
                    <div>
                        <p>your last application was denied!, you may try again.</p>
                    </div>
        @elseif($profile->retailer_approvalstateid == 2)
        <div>
            <p>You are registered as retailer</p>
        </div>
        @else
                <p><b>[Retailer Appliaction] already Sent and Awaiting Approval from Admins, Please wait atleast 24 hours.</b></p>
                
        @endif
    @endif
      
   
</div>







@endsection