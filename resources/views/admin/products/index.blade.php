@extends ('layouts/admin-template')

@section('content')
    <div class="page-content">
        <div class="row">
            <div class="col-lg-10 mr-auto ml-auto">
                <div class="container">
                    <h3>Product List</h3>
                    <span>Verify retailer products</span>
                </div>
                <div class="card-body table-responsive-sm">

                    <!--SUCESS MESSAGE-->

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <!--TABLE-->
                    <table
                        class="table table-bordered table-striped table-hover table-responsive-sm table-responsive-lg">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID - Name</th>
                                <th>Verified</th>
                                <th>Created At</th>
                                <th>options</th>
                            </tr>
                        </thead>

                        <!--TABLE-->

                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->product_id }} - {{ $product->product_name }}</td>
                                <td>{{ $product->is_verified }}</td>
                                <td>{{ $product->created_at->toDateString()}}</td>
                                <td>
                                    <div class="row justify-items-center ">
                                        @if ($product->verified)
                                        <form action="{{ route('admin.product.invalidate', ['id' => $product->product_id]) }}"
                                            method="POST">
                                            @csrf
                                            <div class="mr-2">
                                                <button class="btn btn-danger text-white " type="submit"><i class="fas fa-times mr-2"></i>Unverify</button>
                                            </div>
                                           
                                        </form>
                                        @else
                                            <form action="{{ route('admin.product.validate', ['id' => $product->product_id]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="text-white mr-2">
                                                    <button class="btn btn-primary" type="submit"><i class="fas fa-check mr-2"></i>Verify</button>
                                                </div>
                                            
                                            </form>
                                        @endif

                                        <button class="btn btn-success mr-2 "><a class="text-white" href="{{ route('inspect2.index') }}"><i class="fas fa-search mr-2 text-white"></i>Inspect</a></button>
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
