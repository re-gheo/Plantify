@extends('layouts.admin-template')
@section('content')
<div class="page-content">
    <div class="row">

        <div class="container ">
            {{-- END OF TOGGLE BUTTON --}}

            {{-- START OF CONTENT --}}

            <h2 class="ml-3">Check all Articles</h2>
            <a class="btn btn-success mt-2 ml-3" href="{{ route('articles.create') }}"> Create new article</a>
            <div class="card-body table-responsive-sm">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th width="250px">Action</th>
                        </tr>
                    </thead>

                    @foreach ($articles as $article)
                        <tr>
                            {{-- <input type="hidden" class="servdelete_val_id" value="{{ $article->article_id }}"> --}}
                            <td>{{ $article->article_topic }}</td>
                            <div>
                                <td class="d-flex">
                                    <!-- Delete -->

                                    <form  id="deleteForm" action="{{route('articles.destroy', ['article' => $article->article_id])}}" method="POST">
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
                                                          Are you sure you want to delete Article: {{$article->article_topic}}?
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
                                    {{-- <form action="{{ route('articles.destroy', $article->article_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger m-2 servideletebtn">Delete</button>


                                    </form> --}}
                                    
                                    {{-- <button type="submit" class="btn btn-danger m-2 servideletebtn">Delete</button> --}}
                                    
                                    <a class="btn btn-info m-2"
                                        href="{{ route('articles.show', $article->article_id) }}">Show</a>

                                    <a class="btn btn-secondary m-2"
                                        href="{{ route('articles.edit', $article->article_id) }}">Edit</a>
                                </td>
                            </div>

                        </tr>
                    @endforeach
                </table>

                {!! $articles->links() !!}
            </div>
        </div>
    </div>

</div>

@endsection

{{-- Sweet Alert AJAX --}}
{{-- @section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function ()
    {
        $('.servideletebtn').click(function (e) 
        {
            $.ajaxSetup({
                headers: {
                    'X-CRSF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            e.preventDefault();

            var delete_id = $(this).closest("tr").find(".servdelete_val_id").val();
            // alert(delete_id);

            swal({
                    title: "Are you sure?",
                    text: "Are you sure you want to delete this entry?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        var data = {
                            "_token": $('input[name="csrf-token"]').val(),
                            "id": delete_id,
                        }
                        $.ajax({
                            type: "DELETE",
                            url: "/service-cate-delete/"+delete_id,
                            data: data,
                            success: function (respone) {
                                swal(response.status, {
                                    icon: "success",
                                    })
                                    .then((willDelete) => {
                                        location.reload();
                            });

                        })
                    }
                });
        });
    });
</script>

@endsection --}}
