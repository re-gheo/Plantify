@extends ('layouts/template')

@section('content')
    <div class="container">
        <div class="row  justify-content-center">
            <div class=" card-row col-md-10 border">
                <h1 class="mt-2">
                    <b> Orders: <h3>Order ID: {{ $olist->orderdetails_id }} </h3></b>
                </h1>

                <div class="row">
                    <div class="col-11">
                        <div class="" id="" role="tablist" aria-orientation="">

                            <div class="card">
                                <div>
                                    <div>

                                    </div>
                                    <h5>Schedule</h4>
                                        <div>
                                            <label for="">The Date order was made</label>

                                            <div>
                                                <b>{{ \Carbon\Carbon::parse($olist->order_datecreated)->format('d/m/Y') }}</b>
                                            </div>
                                        </div>
                                        <div>
                                            <label for="">Date of item to be shipped</label>
                                            <div>
                                                <b>{{ \Carbon\Carbon::parse($olist->order_dateshipped)->format('d/m/Y') }}</b>
                                            </div>
                                        </div>
                                </div>
                                <div>
                                    <label for="">
                                        <h4>Total Amount paid</h4>
                                    </label>
                                    <div>
                                        <div>
                                            {{ number_format($olist->order_subtotal, 2) }} <b>PHP</b>
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div>
                                    <h3>Item list</h3>
                                </div>
                                <div>
                                    <table style="width:100%">
                                        <tr>
                                            <th></th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Amount</th>
                                        </tr>
                                        @foreach ($items as $it)

                                            <tr>
                                                <td> <img src="{{ asset('/storage/' . $it->product_mainphoto) }}"
                                                        height="100" alt="background"></td>
                                                <td> {{ $it->cart_itemname }}</td>
                                                <td> {{ $it->cart_quantity }}</td>
                                                <td> {{ $it->cart_subtotal }}</td>
                                            </tr>



                                        @endforeach
                                    </table>
                                </div>

                            </div>

                            <div>
                                <h3>options </h3>




                                <form action="{{ route('client.order.cancel', ['id' => $olist->orderdetails_id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('put')

                                    <button class="btn btn-danger" type="submit" {{ $olist->order_dateshipped <=  Carbon\Carbon::today('Asia/Manila')->addDay(1)  ? 'disabled' : '' }}> Cancel Order</button>
                                   <p> Info: you may cancel this order only before {{ \Carbon\Carbon::parse($olist->order_dateshipped)->format('d/m/Y') }}</p>
                                </form>
                                <br>
                                <form action="{{ route('client.order.recieve', ['id' => $olist->orderdetails_id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('put')
                                    <button class="btn btn-success" type="submit" {{ $olist->order_dateshipped >=  Carbon\Carbon::today('Asia/Manila')->addDay(1)  ? 'disabled' : '' }}> I have recieved order</button>
                                    <p> Info: update our system once you recieved your order</p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
