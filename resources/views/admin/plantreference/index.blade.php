@extends ('layouts/admin-template')

@section('content')

    <div class="page-content p-5">
        <div class="pull-right">
            <a href="{{ route('plantreference.create') }}" class="btn btn-dark"> create a reference</a>
        </div>

        <div class="thead-text">
            <h3 class="text-center">Plant Reference Table</h3>
        </div>
        <div class="card-body table-responsive-sm">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered table-striped table-hover ">
                <thead class="thead-dark">

                    <tr>
                        <th>Scientific Name</th>
                        {{-- <th>description</th>
                                <th>maintenance</th> --}}
                        <th>Category</th>
                        <th>Preview</th>
                        <th>Options</th>
                    </tr>
                </thead>


                @foreach ($references as $reference)


                    <tr>
                        <td>{{ $reference->plant_scientificname }}</td>
                        {{-- <td>{{ $reference->plant_description }}</td>
                              <td>{{ $reference->plant_maintenance }}</td> --}}

                        {{-- NOTSURE IF NEEDED --}}
                        <td>{{ $reference->categories }}</td>
                        <td>
                            <div class="row">
                                <img class="m-1" src="{{ asset('/storage/' . $reference->plant_photo) }}" width="150"
                                    height="150" alt="main">
                                <img class="m-1" src="{{ asset('/storage/' . $reference->plant_phototwo) }}" width="150"
                                    height="150" alt="None">
                                <img class="m-1" src="{{ asset('/storage/' . $reference->plant_photothree) }}" width="150"
                                    height="150" alt="None">
                            </div>

                        </td>
                        <td>
                            <div class="row ">
                                <a href="{{ route('plantreference.destroy',  $reference->plant_referenceid) }}"
                                    class="btn btn-dark m-1">EDIT</a>

                                <!-- Delete -->

                                <form  id="deleteForm" action="{{route('keyword.destroy',  $reference->plant_referenceid)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                                        Delete
                                     </button>

                                       <!-- Modal -->
                                       <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <p class="text-center text-black">
                                                      Are you sure you want to delete reference: {{$reference->plant_scientificname}}?
                                                    </p>
                                                  </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                              <button  form="deleteForm" type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                  </form>

                                {{-- <form
                                    action="{{ route('plantreference.destroy', ['id' => $reference->plant_referenceid]) }}/delete"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger m-1 servideletebtn"> Delete </button>

                                </form> --}}
                            </div>
                            <div>

                            </div>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>



    </div>

    </div>



@endsection