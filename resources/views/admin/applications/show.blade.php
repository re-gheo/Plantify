@extends ('layouts/admin-template')

@section ('content')
<h1><b> information of the applicant's form - <u>{{ $app->retailer_approvalstate}}</u></b></h1>

<div>
    <div>
        <label for=""><b>Users Email</b></label>
        <div>
            <p>{{ $app->email }}</p>
        </div>
    </div>

</div>

<div>
    <div>
        <label for=""><b>Retailers Name</b></label>
        <div>
            <p>{{ $app->retailer_personincharge }}</p>
        </div>
    </div>

</div>

<div>
    <div>
        <label for=""><b>Postal Code</b></label>
        <div>
            <p>{{ Crypt::decryptString($app->retailer_postalcode) }}</p>
        </div>
    </div>

</div>

<div>
    <div>
        <label for=""><b>Image of ID - FRONT</b></label>
     
            <div>
                <img src="{{url('/storage/'.$app->retailer_officialidfront)  }}"  height="300" alt="main">
             </div>
        <
    </div>

</div>


<div>
    <div>
        <label for=""><b>Image of ID - Back</b></label>
        <div>
            <img src="{{url('/storage/'.$app->retailer_officialidback)  }}"  height="300" alt="main">
         </div>
    </div>

</div>


<div>
    <div>
        <label for=""><b>Id number of the image</b></label>
        <div>

            <p>{{ Crypt::decryptString($app->retailer_idnumber)}}</p>
        </div>
    </div>

</div>


<div>
    <div>
        <label for=""><b>Your Address for delivery</b></label>
        <div>

            <p>{{ $app->address}}</p>
        </div>
    </div>

</div>


<div>
    <div>
        <label for=""><b>Barangay</b></label>
        <div>

            <p>{{ $app->retailer_barangay}}</p>
        </div>
    </div>

</div>

<div>
    <div>
        <label for=""><b>Region</b></label>
        <div>

            <p>{{ $app->retailer_region}}</p>
        </div>
    </div>

</div>
<div>
    <div>
        <label for=""><b>City</b></label>
        <div>

            <p>{{ $app->retailer_city}}</p>
        </div>
    </div>

</div>
<h3> APROVE/DENY USER</h3>

<form action="/admin/customer_application/approve/{{$app->retailer_applicationid}}" method="POST">
@csrf
@method('put')

<button type="submit" class="btn btn-dark">APPROVE APPLICATION</button>
</form>

<br>
<br>
<form action="/admin/customer_application/deny/{{$app->retailer_applicationid}}" method="POST">
    @csrf
    @method('put')
    <h3><label for="">Reason to deny application</label></h3>
    <label><input type="checkbox" name="deny_reason[]" value="<li> User ID does not exist in our records </li>" onClick="otherReason()">User ID does not exist in our records</label><br>
    <label><input type="checkbox" name="deny_reason[]" value="<li> Invalid/incorrect Information Submitted. </li>" onClick="otherReason()">Invalid/incorrect Information Submitted</label><br>
    <label><input type="checkbox" name="deny_reason[]" value="<li> Invalid ID or ID number does not match. </li>" onClick="otherReason()">Invalid ID or ID number does not match</label><br>
    <label><input type="checkbox" name="deny_reason[]" value="<li> Incorrect or Incomplete Address postal code and Barangay fiels submitted Submitted. </li>" onClick="otherReason()">Incorrect or Incomplete Address postal code and Barangay fiels submitted Submitted</label><br>
    <label onClick="otherReason()">
        <input type="checkbox" name="deny_reason[]" id="other" value="other" >OTHERS:
        <br><textarea name="other" id="inputother" onchange="checkother ()" cols="50" rows="5"></textarea>
       
    <br>

    
    <br>
    <button type="submit" class="btn btn-dark"> DENY APPLICATION </button>
    </form>


    <br>
    @if(isset($app->deny_reason))
    <ol>
        Status of the application was denied because: 
        {!! $app->deny_reason !!}
    </ol>
    @endif
    <br>
    <br>
    <br>
    <br>

    <script>
        function checkother() {
          
  var other = document.getElementById("other");
  other.value = document.getElementById("inputother").value;
}
    </script>
@endsection