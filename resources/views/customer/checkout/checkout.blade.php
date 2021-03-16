@extends ('layouts/template')

@section('content')
    @php
    $i = 0;
    $sub = 0;
    @endphp
    <br>

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


        <form action="{{ route('customer.checkout.order') }}" method="POST">
            <div class="div class= card-body">
                <h1>Choose Payment Methods</h1>
                <a href="{{ route('customer.payment.register') }}"> add a card</a>
                @forelse ($mycards as $c)

                    <div class="col-lg-8 col-xl-6 card mt-5 shadow p-3border-3 ">
                        <div>
                            <h4>card type: ????</h4>

                            {{-- (lanz i need you to detect the card type via java script) --}}
                        </div>

                        <div>
                            <b>{{ maskNumber(Crypt::decryptString($c->card_number)) }}</b>

                        </div>
                        select <input type="radio" name="paytype" id="paytype" value="[1,{{ $c->card_id }}]">


                    </div>
                @empty
                    <h3>You have no Payment method Registerd, <a href="{{ route('customer.payment.register') }}"> add a card</a></h3>
                @endforelse

                <div class="col-lg-8 col-xl-6 card  mt-5 shadow p-3border-3 ">
                    <div>
                        <h4>E-Wallet</h4>
                    </div>
                    <div>
                        <b>Gcash</b>

                    </div>
                    select <input type="radio" name="paytype" id="paytype" value="[0,0]">
                    <div>

                    </div>


                </div>

            </div>

            @csrf
            <button type="submit" class="btn btn-success "> PLACE ORDER</button>
        </form>

    </div>
@endsection
