@extends ('layouts/admin-template')

@section('content')

    <div class="page-content p-5">
        <div class="pull-right">
            <a href="{{ route('admin.reference.create') }}" class="btn btn-dark"> create a reference</a>
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
                                <a href="{{ route('admin.reference.show', ['id' => $reference->plant_referenceid]) }}"
                                    class="btn btn-dark m-1">EDIT</a>
                                <form
                                    action="{{ route('admin.reference.delete', ['id' => $reference->plant_referenceid]) }}/delete"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger m-1"> Delete </button>
                                    {{-- Kenneth Put a warning box here --}}

                                </form>
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
