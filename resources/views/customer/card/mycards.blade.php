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

                    <div class="col-lg-8 col-xl-6 card flex-column mx-auto mt-5 shadow p-3border-3 ">
                        <div>
                            <h4>card type: ????</h4>

                            {{-- (lanz i need you to detect the card type via java script) --}}
                        </div>

                        <div>
                            <b>{{ maskNumber(Crypt::decryptString($c->card_number)) }}</b>
                        </div>
                        <div>
                            <button type="submit"> Remove card</button>
                        </div>
                    </div>
                @empty
                    <h3>You have no Payment Register in our site</h3>
                @endforelse

            </div>

        </div>

    </div>
@endsection
