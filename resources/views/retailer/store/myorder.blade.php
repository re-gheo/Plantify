@extends ('layouts/template')

@section('content')

    <div class="container">
        <div class="container mb-4" id="selecitem">
            <h1>My Orders from Customer</h1>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive ">


                     

                        <table class="table table-striped">

                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Item Photo</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col" class="text-center">Price</th>
                                    <th scope="col" class="text-right">Quantity</th>
                                  
                                    <th scope="col" class="text-right">Subtotal Price</th>
                                    <th scope="col" class="text-right">To </th>
                                    <th scope="col" class="text-right">Order Created At</th>
                                    <th scope="col" class="text-right">Order Date to Be Picked Up</th>
                                </tr>
                            </thead>

                            @forelse ($olist as $i)



                                <tr>
                                    <td>
                                        <img src="{{ asset('/storage/' . $i->product_mainphoto) }}" height="100"
                                            alt="background">
                                    </td>
                                    <td>
                                        <b>{{ $i->product_name }}</b>
                                    </td>
                                    <td>
                                        <b>{{ $i->order_unitcost }} PHP</b>
                                    </td>

                                    <td>
                                        <b class="m-2 text-center">  {{ $i->order_quantity }} </b>
                                    </td>

                                    <td>
                                        <b class="m-2 text-center"> PHP {{ $i->order_subtotal }} </b>
                                    </td>

                                    <td>
                                        <b class="m-2 text-center"> {{ $i->name }} </b>
                                    </td>

                                    <td>
                                        <b class="m-2 text-center">
                                            {{ \Carbon\Carbon::parse($i->order_datecreated)->format('d/m/Y') }}</b>
                                    </td>

                                    <td>
                                        <b class="m-2 text-center">
                                            {{ \Carbon\Carbon::parse($i->order_dateshipped)->format('d/m/Y') }}</b>
                                    </td>
                                </tr>




                            @empty
                            @endforelse

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
