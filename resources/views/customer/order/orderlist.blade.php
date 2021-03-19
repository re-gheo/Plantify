@extends ('layouts/template')

@section('content')
    <div class="container">
        <div class="row  justify-content-center">
            <div class=" card-row col-md-10 border">
                <h1 class="mt-2">
                    <b>My Orders</b>
                </h1>

                <div class="row">
                    <div class="col-11">
                        <div class="" id="" role="tablist" aria-orientation="">
                            @forelse($olist as $ol)
                                <div class="card">
                                    <div>
                                        <div>
                                          
                                            <a href="{{ route('client.order.detail',['id' => $ol->orderdetails_id]) }}"><h3>Order ID: {{ $ol->orderdetails_id }} </h3></a>
                                        </div>
                                        <h5>Schedule</h4>
                                            <div>
                                                <label for="">The Date order was made</label>

                                                <div>
                                                    <b>{{ \Carbon\Carbon::parse($ol->order_datecreated)->format('d/m/Y') }}</b>
                                                </div>
                                            </div>
                                            <div>
                                                <label for="">Date of item to be shipped</label>
                                                <div>
                                                    <b>{{ \Carbon\Carbon::parse($ol->order_dateshipped)->format('d/m/Y') }}</b>
                                                </div>
                                            </div>
                                    </div>
                                    <div>
                                        <label for="">
                                            <h4>Total Amount paid</h4>
                                        </label>
                                        <div>
                                            <div>
                                                {{ number_format($ol->order_subtotal, 2) }} <b>PHP</b>
                                            </div>

                                        </div>
                                    </div>
                                    <br>
                                    <div><h3>Item list</h3></div>
                                    <div>
                                        <table style="width:100%">
                                            <tr><th></th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Amount</th>
                                            </tr>
                                            @forelse ($items[$ol->orderdetails_id] as $key => $V1)
                                                @foreach ($items[$ol->orderdetails_id][$key] as $V2)
                                                    <tr>
                                                        <td> <img src="{{ asset('/storage/' . $V2->product_mainphoto) }}" height="100" alt="background"></td>
                                                        <td> {{ $V2->cart_itemname }}</td>
                                                        <td> {{ $V2->cart_quantity }}</td>
                                                        <td> {{ $V2->cart_subtotal }}</td>
                                                    </tr>
                                                @endforeach
                                            @empty    
                                            @endforelse
                                        </table>
                                    </div>
                                </div>
                            @empty
                                <h1>Oh! You have no orders.</h1>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
