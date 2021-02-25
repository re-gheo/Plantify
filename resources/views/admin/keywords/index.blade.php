@extends ('layouts/admin-template')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-10 mr-auto ml-auto">
                <div class="pull-right">

                </div>

                <div class="card-body table-responsive-sm">

                    <!--SUCESS MESSAGE-->

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif




                    <table class="table table-bordered table-striped table-hover table-responsive-sm">

                        <form action="/admin/keyword/create" method="POST">
                            @csrf

                            <div class="row">
                                <h2><strong>KEYWORD</strong></h2>
                            </div>
                            <div>
                                <p><strong>Description:</strong> keyword are essentially tag that assist its users to define
                                    a product base on it feautures and characteristics. </p>
                            </div>


                            <div class="row">
                                <label class="pr-3" for="keywords"><b>Create NEW Keyword</b></label>
                                <input class="form-input" id="keywords" type="text"
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
                                <form action="/admin/keyword/update/{{ $k->keyword_id }}" method="POST">
                                    @csrf
                                    @method('put')

                                    <td>{{ $k->keyword_id }}</td>

                                    <td> <input id="categorieedit" type="text" class=" 
                      @error('categorieedit') is-invalid @enderror" name="keywordedit" required
                                            autocomplete="categorieedit" value="{{ $k->keyword_name }}">

                                        @error('keywordedit')
                                            <span class="" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </td>

                                    <td>
                                        <div class="form-inline">
                                            <button class="btn btn-success pl-auto" type="submit">Edit</button>
                                </form>
                                <form action="/admin/keyword/delete/{{ $k->keyword_id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger pl-auto" type="submit">delete </button>
                                </form>
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
