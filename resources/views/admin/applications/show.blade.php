@extends ('layouts/admin-template')

@section('content')
    <div class="text-center">
        <h1><b> Information of the applicant's form - <u>{{ $app->retailer_approvalstate }}</u></b></h1>
    </div>

    <button id="sidebarCollapse" type="button"
        class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4 float-right"><i class="fa fa-bars mr-2"></i><small
            class="text-uppercase font-weight-bold">Toggle</small></button>


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-6 card flex-row mx-auto px-4 shadow p-3 mb-5 border-3">

                {{-- Start of Card content --}}

                <div class="card-body mx-auto">
                    <div class="">

                        {{-- Start of Page content --}}
                        <label for=""><b>Users Email: </b></label>
                        {{ $app->email }}



                    </div>

                    <br>

                    <div>
                        <div>
                            <label for=""><b>Retailers Name: </b></label>

                            {{ $app->retailer_personincharge }}

                        </div>

                    </div>

                    <br>


                    <div>
                        <div>
                            <label for=""><b>Postal Code: </b></label>

                            {{ Crypt::decryptString($app->retailer_postalcode) }}

                        </div>

                    </div>


                    <br>
                    <hr>
                    <div>
                        <label for=""><b>Image of ID - FRONT:</b></label>

                        <div>
                            <img class="mx-auto d-block" src="{{ asset('/storage/' . $app->retailer_officialidfront) }}"
                                height="250" width="250" alt="main">
                        </div>
                    </div>

                    <hr>
                    <br>

                    <div>
                        <div>
                            <label for=""><b>Image of ID - Back: </b></label>
                            <div>
                                <img class="mx-auto d-block" src="{{ asset('/storage/' . $app->retailer_officialidback) }}"
                                    height="250" width="250" alt="main">
                            </div>
                        </div>

                    </div>
                    <br>
                    <hr>


                    <div>
                        <div>
                            <label for=""><b>Id number of the image: </b></label>


                            {{ Crypt::decryptString($app->retailer_idnumber) }}

                        </div>

                    </div>
                    <br>

                    <div>
                        <div>
                            <label for=""><b>Your Address for delivery: </b></label>


                            {{ $app->address }}

                        </div>

                    </div>

                    <br>
                    <div>
                        <div>
                            <label for=""><b>Barangay</b></label>
                            <div>

                                <p>{{ $app->retailer_barangay }}</p>
                            </div>
                        </div>

                        <br>


                        <div>
                            <div>
                                <label for=""><b>Region</b></label>
                                <div>

                                    <p>{{ $app->retailer_region }}</p>
                                </div>
                            </div>

                        </div>

                        <br>

                        <div>
                            <div>
                                <label for=""><b>City</b></label>
                                <div>

                                    <p>{{ $app->retailer_city }}</p>
                                </div>
                            </div>

                        </div>

                        <br>

                        <div>
                            <div>
                                <label for=""><b>Region</b></label>
                                <div>

                                    <p>{{ $app->retailer_region }}</p>
                                </div>
                            </div>

                        </div>

                        <br>

                        <hr>

                        {{-- Start of application shit --}}


                        <h3> APROVE/DENY USER</h3>

                        <br>
                        <form action="{{route('admin.customer_application.approve', ['id' =>$app->retailer_applicationid]) }}"   
                            method="POST">
                            @csrf
                            @method('put')

                            <button type="submit" class="btn btn-success text-center serviapprovebtn">APPROVE APPLICATION</button>
                        </form>

                        <br>

                        <form action="{{route('admin.customer_application.deny', ['id' =>$app->retailer_applicationid]) }}" method="POST">
                            @csrf
                            @method('put')
                            <h3><label for="">Reason to deny application</label></h3>
                            <label><input type="checkbox" name="deny_reason[]"
                                    value="<li> User ID does not exist in our records </li>" onClick="otherReason()">User ID
                                does not exist in our records</label><br>
                            <label><input type="checkbox" name="deny_reason[]"
                                    value="<li> Invalid/incorrect Information Submitted. </li>"
                                    onClick="otherReason()">Invalid/incorrect Information Submitted</label><br>
                            <label><input type="checkbox" name="deny_reason[]"
                                    value="<li> Invalid ID or ID number does not match. </li>"
                                    onClick="otherReason()">Invalid ID or ID number does not match</label><br>
                            <label><input type="checkbox" name="deny_reason[]"
                                    value="<li> Incorrect or Incomplete Address postal code and Barangay fiels submitted Submitted. </li>"
                                    onClick="otherReason()">Incorrect or Incomplete Address postal code and Barangay fiels
                                submitted
                                Submitted</label><br>
                            <label onClick="otherReason()">
                                <input type="checkbox" name="deny_reason[]" id="other" value="other">OTHERS:
                                <br><textarea class="txtarea" name="other" id="inputother" onchange="checkother()"
                                    cols="50" rows="5"></textarea>
                                <br>


                                <br>
                                <button type="submit" class="btn btn-danger text-center servidenybtn"> DENY APPLICATION </button>
                        </form>


                    </div>




                </div>
            </div>
        </div>
    </div>




    <div>




        <br>
        <br>


        <br>
        @if (isset($app->deny_reason))
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

    @section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function ()
    {
        $('.servidenybtn').click(function (e) 
        {
            e.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "Are you sure you want to deny this application?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Application denied successfully!", {
                        icon: "success",
                        });
                    }
                });
        });
    });
</script>

<script>
    $(document).ready(function ()
    {
        $('.serviapprovebtn').click(function (e) 
        {
            e.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "Are you sure you want to delete this entry?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: false,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Application approved successfully!", {
                        icon: "success",
                        });
                    }
                });
        });
    });
</script>

@endsection