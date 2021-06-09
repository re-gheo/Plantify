@extends ('layouts/admin-template')

@section('content')

    <div class="page-content">
        <div class="row">
            <div class="col-lg-10 mr-auto ml-auto">
                <div class="container">
                    <!--SUCESS MESSAGE-->
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-bordered table-striped table-hover   card-body table-responsive-sm">
                        <form action="{{ route('admin.category.create') }}" method="POST">
                            @csrf

                            <div class="row">
                                <h2><strong>Categories</strong></h2>
                            </div>

                            <div class="row">
                                <label class="pr-3 mt-2" for="categories">Category Name</label>
                                <input class="cat-input" id="categories" type="text"
                                    class=" @error('categories') is-invalid @enderror" name="categories" required
                                    autocomplete="categories">
                                <button class="btn btn-success ml-auto " type="submit"> create category</button>
                            </div>
                            @error('categories')
                                <span class="" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <!--TABLE-->

                        </form>

                        <thead class="thead-dark">
                            <tr>
                                <th>Category name</th>
                                <th>options</th>
                            </tr>
                        </thead>

                        @forelse ($categories as $category)

                            <tr>
                                <form
                                    action="{{ route('admin.category.update', ['id' => $category->product_categoryid]) }}"
                                    method="POST">
                                    @csrf
                                    @method('put')

                                    <td> <input class="cat-input" id="categorieedit" type="text"
                                            class=" @error('categorieedit') is-invalid @enderror" name="categorieedit"
                                            required autocomplete="categorieedit" value="{{ $category->categories }}">

                                        @error('categorieedit')
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

                                <form  id="deleteForm" action="{{route('admin.category.delete', ['id' => $category->product_categoryid])}}" method="POST">
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
                                                      Are you sure you want to delete category: {{$category->categories}}?
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

                                  
                                {{-- Old Delete Code --}}
                                {{-- <form action="{{ route('admin.category.delete', ['id' => $category->product_categoryid]) }}"
                                    method="POST"> @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger pl-auto servideletebtn" type="submit">delete </button>
                                </form> --}}
                    </div>
                    </td>
                    </tr>
                @empty
                    <p>There are no record <a href="">Add</a></p>
                @endforelse

                </table>
            </div>
        </div>
    </div>
    </div>


@endsection
