@extends ('layouts/template')



@section('content')

    <div class="d-flex justify-content-center container mt-5">
        <table class="table">
            <tr>
                <th>Description</th>
                <th>Free</th>
                <th>Subscribed</th>
            </tr>
            <tr>
                <td>Ads Space</td>
                <td>No Ads Space</td>
                <td>1 ad space with customization</td>
            </tr>
            <tr>
                <td>Retailer Request to admin to make personal keywords</td>
                <td>Cant request keyword </td>
                <td>Can request up to 3 keyword </td>
            </tr>
            <tr>
                <td>Limit of Products To be displayed in store</td>
                <td>Limit 8 products</td>
                <td>Unlimited products upload</td>
            </tr>
            <tr>
                <td>Limit Amount of Inventory for each product</td>
                <td>Limit inventory 20</td>
                <td>100 for each product</td>
            </tr>
            <tr>
                <td>Amount of Photo for Each Product to be displayed in the site</td>
                <td>1 Phote Each Product</td>
                <td>Multiple Photos Each Product</td>
            </tr>
            <tr>
                <td>Reports</td>
                <td>Minumum Reports</td>
                <td>Daily to Annually reports to download in excel format</td>
            </tr>


        </table>
    </div>

    @if ($message = Session::get('denied'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="d-flex justify-content-center container mt-5">
        <h3><b>Available Plans</b></h3>
        <table class="table">
            <tr>
                <th>PLAN</th>
                <th>1 MONTH SUBSCRIPTION</th>
                <th>3 MONTH SUBSCRIPTION </th>
                <th>6 MONTH SUBSCRIPTION</th>
            </tr>
            <tr>
                <td>AMMOUNT</td>
                <td>₱ 249.00</td>
                <td>₱ 499.00</td>
                <td>₱ 599.00</td>
            </tr>




        </table>
    </div>





    <div class="container mt-5">
        <form action="{{ route('subscriptions.store') }}" method="post">
            @csrf
            <div>
                <div>
                    <label for="">
                        PLAN
                    </label>
                </div>
                <select class="form-select" name="plan">
                    <option value="1">1 month</option>
                    <option value="2">3 month</option>
                    <option value="3">6 month</option>
                </select>
                <div class="form-input">
                    <p>Number</p>
                    <input type="text" name="number" required id="card_number" value="{{ old('card_number') }}">
                    @error('number')
                        <div>
                            invalid number does no align with lughn algortihm
                        </div>
                    @enderror
                </div>

                <div class="form-input">
                    <p>Name on Card</p>
                    <input type="text" name="holdername" required id="holdername" value="{{ old('holdername') }}">
                    @error('holdername')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-input">
                    <p>cvv</p>
                    <input type="text" name="cvv" required id="cvv" value="{{ old('cvv') }}">
                    @error('cvv')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-input">
                    <p>expiration date</p>
                    <input type="month" name="card_exp" required id="card_exp"
                        min="{{ Carbon\Carbon::today('Asia/Manila')->subYear(1)->format('Y-m') }}"
                        max="{{ Carbon\Carbon::today('Asia/Manila')->addYear(3)->format('Y-m') }}"
                        value="{{ old('card_exp') }}">
                    @error('card_exp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-input">
                    <hr>
                    <h3>Billing Address</h3>
                    <p>Address line </p>
                    <input type="text" name="line1" required id="line1" value="{{ old('line1') }}">
                    @error('line1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



                <div class="form-input">
                    <p>City </p>
                    <input type="text" name="city" required id="city" value="{{ old('city') }}">
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-input">
                    <p>State</p>
                    <input type="text" name="state" required id="state" value="{{ old('state') }}">
                    @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-input">
                    <p>Postal Code</p>
                    <input type="text" name="postal_code" required id="postal_code" value="{{ old('card_number') }}">
                    @error('postal_code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>




                <br>
                <button class="btn btn-block btn-success text-uppercase my-2 mx-a" type="submit">Subscribe</button>
        </form>
    </div>


@endsection
