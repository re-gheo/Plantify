@extends ('layouts/template')
@section('content')
<form action="/store/profile/addpayment/register" method="POST">
    @csrf
   
        <p>Number</p>
        <input type="text" name="card_number" required id="card_number">
        @error('card_number')
        <div>
            invalid number does no align with lughn algortihm
        </div>
    @enderror
        <p>Name on Card</p>
        <input type="text" name="card_holdername" required id="card_holdername">
        @error('card_holdername')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <p>cvv</p>
        <input type="text" name="card_cvv" required id="card_cvv">
        @error('card_cvv')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <p>expiration date</p>
        <input type="month" name="card_exp" required id="card_exp"
            min="{{ Carbon\Carbon::today('Asia/Manila')->subYear(1)->format('Y-m') }}"
            max="{{ Carbon\Carbon::today('Asia/Manila')->addYear(3)->format('Y-m') }}">
        @error('card_exp')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror



        <br>
        <button type="submit"> Save Card</button>
    </form>
@endsection
