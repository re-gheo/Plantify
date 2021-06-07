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
                                <form
                                    action="{{ route('admin.category.delete', ['id' => $category->product_categoryid]) }}"
                                    method="POST"> @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger pl-auto servideletebtn" type="submit">delete </button>
                                </form>
                </div>
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

@section('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function() {
        $('.servideletebtn').click(function(e) {
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
