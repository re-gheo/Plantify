@extends ('layouts/template')
@section('content')

    @php
    function maskNumber($number)
    {
        $mask_num = str_repeat('*', strlen($number) - 4) . substr($number, -4);

        return $mask_num;
    }
    @endphp

    <div class="row">
        <div class="col-lg-10 mr-auto ml-auto">
            <div class="div class= card-body table-responsive-sm">
                <h1>My Payment Methods</h1>
                <a href="/store/profile/addpayment"> add a card</a>
                @forelse ($mycards as $c)

                    <script type="text/javascript">
                        var card_number = "{{ Crypt::decryptString($c->card_number) }}";

                        function detectCardType(number) {
                            var re = {
                                electron: /^(4026|417500|4405|4508|4844|4913|4917)\d+$/,
                                maestro: /^(5018|5020|5038|5612|5893|6304|6759|6761|6762|6763|0604|6390)\d+$/,
                                dankort: /^(5019)\d+$/,
                                interpayment: /^(636)\d+$/,
                                unionpay: /^(62|88)\d+$/,
                                visa: /^4[0-9]{12}(?:[0-9]{3})?$/,
                                mastercard: /^5[1-5][0-9]{14}$/,
                                amex: /^3[47][0-9]{13}$/,
                                diners: /^3(?:0[0-5]|[68][0-9])[0-9]{11}$/,
                                discover: /^6(?:011|5[0-9]{2})[0-9]{12}$/,
                                jcb: /^(?:2131|1800|35\d{3})\d{11}$/
                            }

                            for (var key in re) {
                                if (re[key].test(number)) {
                                    return key
                                }
                            }

                        }

                        document.getElementById("detect").innerHTML = detectCardType(card_number);

                    </script>

                    <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                        <div>
                            <h4><strong>card type: </strong><b id="detect"></b></h4>

                            {{-- (lanz i need you to detect the card type via java script) --}}
                            {{-- (only works on the first one, if you remove anything else it breaks - Lanz) --}}

                        </div>

                        <div>
                            <b>{{ maskNumber(Crypt::decryptString($c->card_number)) }}</b>
                        </div>
                        <form action="/store/profile/paymentmethods/{{ $c->card_id }}/delete" method="POST">
                            @csrf
                            @method('DELETE')
                            <div>
                                <button type="submit"> Remove card</button>
                            </div>
                        </form>

                    </div>
                @empty
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-xl-5 card flex-row mx-auto px-4 shadow p-3 mb-5 border-3">
                                <div class="card-body mx-auto">
                                    <h3>You have no payment methods registered in our site</h3>
                                    <a href="/store/profile/addpayment"> add a card</a>
                                </div>
                            </div>

                        </div>
                    </div>

                @endforelse

            </div>

        </div>

    </div>
@endsection
