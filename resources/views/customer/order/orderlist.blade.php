@extends ('layouts/template')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class=" card-row col-md-10 border">
                <h1 class="mt-2">
                    <b>My Orders</b>
                </h1>

                <div class="row">
                    <div class="col-4">
                        <div class="nav  " id="" role="tablist" aria-orientation="">
                            @forelse($olist as $ol)
                                <div>
                                    <div>
                                        <h3>Schedule</h3>
                                        <div>
                                            <label for="">The Date order was made</label>
                                            {{-- <div>{{  date_format($ol->order_datecreated, 'Y-M-D') }}</div> --}}
                                            <div> {{ \Carbon\Carbon::parse($ol->order_datecreated)->format('d/m/Y') }}
                                            </div>
                                        </div>
                                        <div>
                                            <label for=""></label>
                                        </div>
                                    </div>
                                    <div>
                                        <label for=""></label>
                                    </div>
                                    <div>
                                        <label for=""></label>
                                    </div>
                                </div>
                            @empty
                                Oh You have no orders
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
