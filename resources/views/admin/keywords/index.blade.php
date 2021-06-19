@extends ('layouts/admin-template')

@section('content')

    <div class="page-content">
        <div class="row">
            <div class="col-lg-10 mr-auto ml-auto">
                <div class="card-body ">

                    <!--SUCESS MESSAGE-->

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif




                    <table class="table table-bordered table-striped table-hover table-responsive-sm">

                        <form action="{{ route('keyword.store') }}" method="POST">
                            @csrf

                            <div class="">
                                <h2><strong>KEYWORDS</strong></h2>
                            </div>
                            <div>
                                <p><strong>Description:</strong> keyword are essentially tag that assist its users to define
                                    a product base on it feautures and characteristics. </p>
                            </div>


                            <div class="row">
                                <label class="pr-3" for="keywords"><b>Create NEW Keyword</b></label>
                                <input class="cat-input" id="keywords" type="text"
                                    class=" @error('keywords') is-invalid @enderror" name="keywords" required
                                    autocomplete="keywords">
                                <button class="btn btn-success ml-auto " type="submit"> create category</button>
                            </div>



                            @error('keywords')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <!--TABLE-->

                        </form>

                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Keyword name</th>
                                <th>options</th>
                            </tr>
                        </thead>

                        @foreach ($keywords as $k)

                            <tr>

                                <form action="{{ route('keyword.update', $k->keyword_id) }}"
                                    method="POST">
                                    @csrf
                                    @method('put')

                                    <td>{{ $k->keyword_id }}</td>

                                    <td> <input class="cat-input" id="categorieedit" type="text" class="
                                                                  @error('categorieedit') is-invalid @enderror"
                                            name="keywordedit" required autocomplete="categorieedit"
                                            value="{{ $k->keyword_name }}">

                                        @error('keywordedit')
                                            <span class="" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>

                                    <td>
                                        <div class="form-inline">
                                            <button class="btn btn-success m-1" type="submit">Edit</button>
                                </form>

                                <!-- Delete -->

                                <form  id="deleteForm" action="{{route('keyword.destroy', $k->keyword_id)}}" method="POST">
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
                                                      Are you sure you want to delete keyword: {{$k->keyword_name}}?
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
                                
                                {{-- <form action="{{ route('keyword.destroy', ['id' => $k->keyword_id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger pl-auto servideletebtn" type="submit">delete </button>
                                </form> --}}
                </div>
                </td>




                </tr>

                @endforeach

                </table>
            </div>
        </div>
    </div>
    </div>


@endsection

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function ()
    {
        $('.servideletebtn').click(function (e) 
        {
            e.preventDefault();
            swal({
                    title: "Are you sure?",
                    text: "Are you sure you want to delete this entry?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Entry deleted successfully!", {
                        icon: "success",
                        });
                    }
                });
        });
    });
</script>

@endsection