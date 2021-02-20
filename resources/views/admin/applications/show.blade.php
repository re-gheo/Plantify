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

    {{-- <label><input type="radio" name="fruit" value="apple" onClick="regularFruit()">apple</input></label>
    <label><input type="radio" name="fruit" value="orange" onClick="regularFruit()">orange</input></label>
    <label><input type="radio" name="fruit" value="lemon" onClick="regularFruit()">lemon</input></label>
    <label onClick="otherFruit()">
        <input type="radio" name="fruit" id="other_fruit" value="other" >or other fruit:</input>
        <input type ="text" name="other" id="other_text"/></label>
        <input type="submit" value="Submit">
    <br> --}}
    <button type="submit" class="btn btn-dark">DENY APPLICATION </button>
    </form>
    <br>
    <br>
    <br>
    <br>
@endsection