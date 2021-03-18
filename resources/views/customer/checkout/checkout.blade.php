@extends ('layouts/template')

@section('content')
    @php
    $i = 0;
    $sub = 0;
    @endphp
    <br>


    <div class="container">

    </div>

    <div class="col-lg-10 mr-auto ml-auto">
        <h1> Checkout</h1>
        <div class="col-lg-8 col-xl-6 card ">
            <table border="1">
                <tr>
                    <th>no # </th>
                    <th>Item Name </th>
                    <th>Store</th>
                    <th>item Cost</th>
                    <th>Quantity</th>
                    <th>Cost Total</th>
                    <th></th>
                </tr>
                @foreach ($items as $key => $item)
                    <tr>
                        <td> {{ $i += 1 }}</td>
                        <td>{{ $item->cart_itemname }}</td>
                        <td>{{ $item->store_name }}</td>
                        <td>{{ $item->cart_itemcost }} php</td>
                        <td>{{ $item->cart_quantity }} x </td>
                        <td>{{ $item->cart_subtotal }} php</td>
                        <th> <img class="img-fluid" src="{{ asset('/storage/' . $item->product_mainphoto) }}"
                                alt="some_image" width="120" height="120"></th>
                    </tr>
                @endforeach
            </table>


        </div>

        <div class="col-lg-8 col-xl-6 card ">
            <table style="width:60%">
                <tr>
                    <th>Sub Total: </th>
                    <td>{{ $cost['subtotal'] }} Php

                </tr>
                <tr>
                    <th>Delivery fee:</th>
                    <td>50.00 Php</td>
                </tr>
                <tr>
                    <th>Order Amount(VAT Not Included):</th>
                    <td><b>{{ $cost['grandtotal'] }} Php</b></td>
                </tr>
            </table>
        </div>


        @php
            function maskNumber($number)
            {
                $mask_num = str_repeat('*', strlen($number) - 4) . substr($number, -4);
            
                return $mask_num;
            }
        @endphp



        <div class="div class= card-body">
            <h1>Choose Payment Methods</h1>

            @forelse ($mycards as $c)
                <form action="{{ route('customer.pay.card') }}" method="POST">
                    @csrf
                    <div class="col-lg-8 col-xl-6 card mt-5 shadow p-3border-3 ">
                        <div>
                            <h4>Card Type: MasterCard/Visa</h4>
                            {{-- (lanz i need you to detect the card type via java script) --}}
                        </div>

                        <div class="form-check">
                            <input type="hidden" name="paytype" id="paytype" value="{{ $c->card_id }}">
                            <label for="chooseCard">
                                <b>{{ maskNumber(Crypt::decryptString($c->card_number)) }}</b>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-success "> Use this option and Checkout</button>
                    </div>
                </form>
            @empty
                <h3>You have no Card Registerd, <a href="{{ route('customer.payment.register') }}"> add a card</a></h3>
            @endforelse
            <form id="ewallet" action="{{ route('customer.pay.ewallet') }}" method="POST">
                @csrf
                <div class="col-lg-8 col-xl-6 card  mt-5 shadow p-3 border-3 ">
                    <div>
                        <h4>E-Wallet</h4>
                    </div>

                    <div class="form-check">
                        <input form="ewallet" type="hidden" name="paytype" id="paytype" value=true>
                        <label for="exampleRadios2">
                            Gcash
                        </label>
                    </div>


                    <div>

                    </div>
                    <button form="ewallet" type="submit" class="btn btn-success "> Use this option and Checkout</button>
                </div>
            </form>

        </div>

        @csrf

        </form>

    </div>
@endsection
