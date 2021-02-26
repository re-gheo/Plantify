@extends ('layouts/template')

@section('content')

<h1 class="checkout-heading stylish-heading">Checkout</h1>
<div class="checkout-section">
    <div>
        <form action="" method="POST" id="payment-form">
            {{ csrf_field() }}
            <h2>Billing Details</h2>

            <div class="form-group">
                <label for="email">Email Address</label>
                @if (auth()->user())
                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                @else
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
            </div>

            <div class="half-form">
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                </div>
                <div class="form-group">
                    <label for="province">Province</label>
                    <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" required>
                </div>
            </div> <!-- end half-form -->

            <div class="half-form">
                <div class="form-group">
                    <label for="postalcode">Postal Code</label>
                    <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                </div>
            </div> <!-- end half-form -->

            <div class="spacer"></div>

            <h2>Payment Details</h2>

            <div class="form-group">
                <label for="name_on_card">Name on Card</label>
                <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
            </div>

            <div class="form-group">
                <label for="card-element">
                  Credit or debit card
                </label>
                <div id="card-element">
       <form novalidate="">
           <div class="App-Global-Fields flex-container spacing-16 direction-row wrap-wrap">
               <div class="flex-item width-12"><div class="FormFieldGroup">
                   <div class="FormFieldGroup-labelContainer flex-container justify-content-space-between">
                      <div class="FormFieldInput"><span class="InputContainer" data-max=""><input class="CheckoutInput Input Input--empty" autocomplete="email" autocorrect="off" spellcheck="false" id="email" name="email" type="text" inputmode="email" autocapitalize="none" aria-invalid="false" aria-describedby="" value=""></span></div></div><div style="opacity: 0; height: 0px;"><span class="FieldError Text Text-color--red Text-fontSize--13"><span></span></span></div></div></div></div></div></div><div class="flex-container spacing-16 direction-row wrap-wrap"><div class="flex-item width-12"><div class="FormFieldGroup"><div class="FormFieldGroup-labelContainer flex-container justify-content-space-between"><label for="cardNumber-fieldset"><span class="Text Text-color--gray600 Text-fontSize--13 Text-fontWeight--500">Card information</span></label></div><fieldset class="FormFieldGroup-Fieldset" id="cardNumber-fieldset"><div class="FormFieldGroup-container" id="cardNumber-fieldset"><div class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop"><div class="FormFieldInput"><span class="InputContainer" data-max=""><input class="CheckoutInput CheckoutInput--tabularnums Input Input--empty" autocomplete="cc-number" autocorrect="off" spellcheck="false" id="cardNumber" name="cardNumber" type="text" inputmode="numeric" aria-label="Card number" placeholder="1234 1234 1234 1234" aria-invalid="false" value=""></span><div class="FormFieldInput-Icons" style="opacity: 1;"><div style="transform: none;"><span class="FormFieldInput-IconsIcon is-visible"><img src="https://js.stripe.com/v3/fingerprinted/img/visa-365725566f9578a9589553aa9296d178.svg" alt="visa" class="BrandIcon"></span></div><div style="transform: none;"><span class="FormFieldInput-IconsIcon is-visible"><img src="https://js.stripe.com/v3/fingerprinted/img/mastercard-4d8844094130711885b5e41b28c9848f.svg" alt="mastercard" class="BrandIcon"></span></div><div style="transform: none;"><span class="FormFieldInput-IconsIcon is-visible"><img src="https://js.stripe.com/v3/fingerprinted/img/amex-a49b82f46c5cd6a96a6e418a6ca1717c.svg" alt="amex" class="BrandIcon"></span></div><div class="CardFormFieldGroupIconOverflow"><span class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--invisible" role="presentation"><span class="FormFieldInput-IconsIcon" role="presentation"><img src="https://js.stripe.com/v3/fingerprinted/img/discover-ac52cd46f89fa40a29a0bfb954e33173.svg" alt="discover" class="BrandIcon"></span></span><span class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--invisible" role="presentation"><span class="FormFieldInput-IconsIcon" role="presentation"><img src="https://js.stripe.com/v3/fingerprinted/img/jcb-271fd06e6e7a2c52692ffa91a95fb64f.svg" alt="jcb" class="BrandIcon"></span></span><span class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--visible" role="presentation"><span class="FormFieldInput-IconsIcon" role="presentation"><img src="https://js.stripe.com/v3/fingerprinted/img/diners-fbcbd3360f8e3f629cdaa80e93abdb8b.svg" alt="diners" class="BrandIcon"></span></span><span class="CardFormFieldGroupIconOverflow-Item CardFormFieldGroupIconOverflow-Item--invisible" role="presentation"><span class="FormFieldInput-IconsIcon" role="presentation"><img src="https://js.stripe.com/v3/fingerprinted/img/unionpay-8a10aefc7295216c338ba4e1224627a1.svg" alt="unionpay" class="BrandIcon"></span></span></div></div></div></div><div class="FormFieldGroup-child FormFieldGroup-child--width-6 FormFieldGroup-childLeft FormFieldGroup-childBottom"><div class="FormFieldInput"><span class="InputContainer" data-max=""><input class="CheckoutInput CheckoutInput--tabularnums Input Input--empty" autocomplete="cc-exp" autocorrect="off" spellcheck="false" id="cardExpiry" name="cardExpiry" type="text" inputmode="numeric" aria-label="Expiration" placeholder="MM / YY" aria-invalid="false" value=""></span></div></div><div class="FormFieldGroup-child FormFieldGroup-child--width-6 FormFieldGroup-childRight FormFieldGroup-childBottom"><div class="FormFieldInput has-icon"><span class="InputContainer" data-max=""><input class="CheckoutInput CheckoutInput--tabularnums Input Input--empty" autocomplete="cc-csc" autocorrect="off" spellcheck="false" id="cardCvc" name="cardCvc" type="text" inputmode="numeric" aria-label="CVC" placeholder="CVC" aria-invalid="false" value=""></span><div class="FormFieldInput-Icon is-loaded"><svg class="Icon Icon--md" focusable="false" viewBox="0 0 32 21"><g fill="none" fill-rule="evenodd"><g class="Icon-fill"><g transform="translate(0 2)"><path d="M21.68 0H2c-.92 0-2 1.06-2 2v15c0 .94 1.08 2 2 2h25c.92 0 2-1.06 2-2V9.47a5.98 5.98 0 0 1-3 1.45V11c0 .66-.36 1-1 1H3c-.64 0-1-.34-1-1v-1c0-.66.36-1 1-1h17.53a5.98 5.98 0 0 1 1.15-9z" opacity=".2"></path><path d="M19.34 3H0v3h19.08a6.04 6.04 0 0 1 .26-3z" opacity=".3"></path></g><g transform="translate(18)"><path d="M7 14A7 7 0 1 1 7 0a7 7 0 0 1 0 14zM4.22 4.1h-.79l-1.93.98v1l1.53-.8V9.9h1.2V4.1zm2.3.8c.57 0 .97.32.97.78 0 .5-.47.85-1.15.85h-.3v.85h.36c.72 0 1.21.36 1.21.88 0 .5-.48.84-1.16.84-.5 0-1-.16-1.52-.47v1c.56.24 1.12.37 1.67.37 1.31 0 2.21-.67 2.21-1.64 0-.68-.42-1.23-1.12-1.45.6-.2.99-.73.99-1.33C8.68 4.64 7.85 4 6.65 4a4 4 0 0 0-1.57.34v.98c.48-.27.97-.42 1.44-.42zm4.32 2.18c.73 0 1.24.43 1.24.99 0 .59-.51 1-1.24 1-.44 0-.9-.14-1.37-.43v1.03c.49.22.99.33 1.48.33.26 0 .5-.04.73-.1.52-.85.82-1.83.82-2.88l-.02-.42a2.3 2.3 0 0 0-1.23-.32c-.18 0-.37.01-.57.04v-1.3h1.44a5.62 5.62 0 0 0-.46-.92H9.64v3.15c.4-.1.8-.17 1.2-.17z"></path></g></g></g></svg></div></div></div><div style="opacity: 0; height: 0px;"><span class="FieldError Text Text-color--red Text-fontSize--13"><span></span></span></div></div></fieldset></div></div><div class="billing-container flex-item width-12"><div style="pointer-events: auto; height: auto; opacity: 1;"><div class="flex-container spacing-16 direction-row wrap-wrap"><div class="flex-item width-12"><div class="FormFieldGroup"><div class="FormFieldGroup-labelContainer flex-container justify-content-space-between"><label for="billingName"><span class="Text Text-color--gray600 Text-fontSize--13 Text-fontWeight--500">Name on card</span></label></div><div class="FormFieldGroup-Fieldset"><div class="FormFieldGroup-container" id="billingName-fieldset"><div class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop FormFieldGroup-childBottom"><div class="FormFieldInput"><span class="InputContainer" data-max=""><input class="CheckoutInput Input Input--empty" autocomplete="ccname" autocorrect="off" spellcheck="false" id="billingName" name="billingName" type="text" aria-invalid="false" value=""></span></div></div><div style="opacity: 0; height: 0px;"><span class="FieldError Text Text-color--red Text-fontSize--13"><span></span></span></div></div></div></div></div><div class="flex-item width-12"><div class="FormFieldGroup"><div class="FormFieldGroup-labelContainer flex-container justify-content-space-between"><label for="country-fieldset"><span class="Text Text-color--gray600 Text-fontSize--13 Text-fontWeight--500">Country or region</span></label></div><fieldset class="FormFieldGroup-Fieldset" id="country-fieldset"><div class="FormFieldGroup-container FormFieldGroup-container--supportTransitions" id="country-fieldset"><div class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childTop"><div class="FormFieldInput is-select"><div><div class="Select"><select id="billingCountry" name="billingCountry" autocomplete="billing country" aria-label="Country or region" class="Select-source"><option value="" disabled="" hidden=""></option><option value="AF">Afghanistan</option><option value="AX">Åland Islands</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua &amp; Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AC">Ascension Island</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia</option><option value="BA">Bosnia &amp; Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="VG">British Virgin Islands</option><option value="BN">Brunei</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="BQ">Caribbean Netherlands</option><option value="KY">Cayman Islands</option>
                    <option value="CF">Central African Republic</option>
                    <option value="TD">Chad</option><option value="CL">Chile</option>
                    <option value="CN">China</option><option value="CO">Colombia</option>
                    <option value="KM">Comoros</option><option value="CG">Congo - Brazzaville
                        </option><option value="CD">Congo - Kinshasa</option>
                        <option value="CK">Cook Islands</option><option value="CR">Costa Rica</option>
                        <option value="CI">Côte d’Ivoire</option><option value="HR">Croatia</option>
                        <option value="CW">Curaçao</option><option value="CY">Cyprus</option>
                        <option value="CZ">Czechia</option><option value="DK">Denmark</option
                            ><option value="DJ">Djibouti</option><option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="SZ">Eswatini</option>
                            <option value="ET">Ethiopia</option><option value="FK">Falkland Islands</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option>
                            <option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option>
                            <option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option>
                            <option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HN">Honduras</option><option value="HK">Hong Kong SAR China</option>
                            <option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option><option value="IM">Isle of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="XK">Kosovo</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option>
                            <option value="LA">Laos</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option>
                            <option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao SAR China</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="MD">Moldova</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar (Burma)</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="MK">North Macedonia</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PS">Palestinian Territories</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn Islands</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="KR">Republic of Korea</option><option value="RE">Réunion</option><option value="RO">Romania</option><option value="RU">Russia</option><option value="RW">Rwanda</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">São Tomé &amp; Príncipe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SX">Sint Maarten</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia &amp; South Sandwich Islands</option><option value="SS">South Sudan</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="BL">St. Barthélemy</option><option value="SH">St. Helena</option><option value="KN">St. Kitts &amp; Nevis</option><option value="LC">St. Lucia</option><option value="MF">St. Martin</option><option value="PM">St. Pierre &amp; Miquelon</option><option value="VC">St. Vincent &amp; Grenadines</option><option value="SR">Suriname</option><option value="SJ">Svalbard &amp; Jan Mayen</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="TW">Taiwan</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania</option><option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad &amp; Tobago</option><option value="TA">Tristan da Cunha</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks &amp; Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US">United States</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VA">Vatican City</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis &amp; Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option></select><svg class="InlineSVG Icon Select-arrow Icon--sm" focusable="false" viewBox="0 0 12 12"><path d="M10.193 3.97a.75.75 0 0 1 1.062 1.062L6.53 9.756a.75.75 0 0 1-1.06 0L.745 5.032A.75.75 0 0 1 1.807 3.97L6 8.163l4.193-4.193z" fill-rule="evenodd"></path></svg></div></div></div></div><div class="FormFieldGroup-child FormFieldGroup-child--width-12 FormFieldGroup-childLeft FormFieldGroup-childRight FormFieldGroup-childBottom" style="height: 38px; transform: none;"><div class="FormFieldInput"><span class="InputContainer" data-max=""><input class="CheckoutInput CheckoutInput--tabularnums Input Input--empty" autocomplete="billing postal-code" autocorrect="off" spellcheck="false" id="billingPostalCode" name="billingPostalCode" type="text" inputmode="numeric" aria-label="ZIP" placeholder="ZIP" aria-invalid="false" value=""></span></div></div><div style="opacity: 0; height: 0px;"><span class="FieldError Text Text-color--red Text-fontSize--13"><span></span></span></div></div></fieldset></div></div></div></div></div><div class="flex-item width-12"></div><div class="flex-item width-12"><button class="SubmitButton SubmitButton--incomplete" type="submit" style="background-color: rgb(52, 49, 69); color: rgb(255, 255, 255);"><div class="SubmitButton-Shimmer" style="background: linear-gradient(to right, rgba(52, 49, 69, 0) 0%, rgb(72, 69, 90) 50%, rgba(52, 49, 69, 0) 100%);"></div><div class="SubmitButton-TextContainer"><span class="SubmitButton-Text SubmitButton-Text--current Text Text-color--default Text-fontWeight--500 Text--truncate">Pay $65.00</span><span class="SubmitButton-Text SubmitButton-Text--pre Text Text-color--default Text-fontWeight--500 Text--truncate">Processing...</span></div><div class="SubmitButton-IconContainer"><div class="SubmitButton-Icon SubmitButton-Icon--pre"><div class="Icon Icon--md Icon--square"><svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" focusable="false"><path d="M3 7V5a5 5 0 1 1 10 0v2h.5a1 1 0 0 1 1 1v6a2 2 0 0 1-2 2h-9a2 2 0 0 1-2-2V8a1 1 0 0 1 1-1zm5 2.5a1 1 0 0 0-1 1v2a1 1 0 0 0 2 0v-2a1 1 0 0 0-1-1zM11 7V5a3 3 0 1 0-6 0v2z" fill="#ffffff" fill-rule="evenodd"></path></svg></div></div><div class="SubmitButton-Icon SubmitButton-SpinnerIcon SubmitButton-Icon--pre"><div class="Icon Icon--md Icon--square"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><ellipse cx="12" cy="12" rx="10" ry="10" style="stroke: rgb(255, 255, 255);"></ellipse></svg></div></div></div><div class="SubmitButton-CheckmarkIcon">
                                <div class="Icon Icon--md"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="14" focusable="false">
                                <path d="M 0.5 6 L 8 13.5 L 21.5 0" fill="transparent" stroke-width="2" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"></path></svg></div>
                            </div></button><div class="ConfirmPayment-PostSubmit"><div></div></div>
                </div></div></form>
                </div>

                <!-- Used to display form errors -->
                <div id="card-errors" role="alert"></div>
            </div>
            <div class="spacer"></div>

            <button type="submit" id="complete-order" class="button-primary full-width">Complete Order</button>


        </form>

        {{-- @if ($paypalToken)
            <div class="mt-32">or</div>
            <div class="mt-32">
                <h2>Pay with PayPal</h2>

                <form method="post" id="paypal-payment-form" action="{{ route('checkout.paypal') }}">
                    @csrf
                    <section>
                        <div class="bt-drop-in-wrapper">
                            <div id="bt-dropin"></div>
                        </div>
                    </section>

                    <input id="nonce" name="payment_method_nonce" type="hidden" />
                    <button class="button-primary" type="submit"><span>Pay with PayPal</span></button>
                </form>
            </div>
        @endif --}}
    </div>



    <div class="checkout-table-container">
        <h2>Your Order</h2>

        <div class="checkout-table">
            {{-- @foreach (Cart::content() as $item)
            <div class="checkout-table-row">
                <div class="checkout-table-row-left">
                    <img src="{{ productImage($item->model->image) }}" alt="item" class="checkout-table-img">
                    <div class="checkout-item-details">
                        <div class="checkout-table-item">{{ $item->model->name }}</div>
                        <div class="checkout-table-description">{{ $item->model->details }}</div>
                        <div class="checkout-table-price">{{ $item->model->presentPrice() }}</div>
                    </div>
                </div> <!-- end checkout-table -->

                <div class="checkout-table-row-right">
                    <div class="checkout-table-quantity">{{ $item->qty }}</div>
                </div>
            </div> <!-- end checkout-table-row -->
            @endforeach --}}

        </div> <!-- end checkout-table -->

        <div class="checkout-totals">
            <div class="checkout-totals-left">
                Subtotal <br>
                @if (session()->has('coupon'))
                    Discount ({{ session()->get('coupon')['name'] }}) :
                    <br>
                    <hr>
                    New Subtotal <br>
                @endif
                Tax ({{config('cart.tax')}}%)<br>
                <span class="checkout-totals-total">Total</span>

            </div>

            {{-- <div class="checkout-totals-right">
                {{ presentPrice(Cart::subtotal()) }} <br>
                @if (session()->has('coupon'))
                    -{{ presentPrice($discount) }} <br>
                    <hr>
                    {{ presentPrice($newSubtotal) }} <br>
                @endif
                {{ presentPrice($newTax) }} <br>
                <span class="checkout-totals-total">{{ presentPrice($newTotal) }}</span>

            </div> --}}
        </div> <!-- end checkout-totals -->
    </div>

</div> <!-- end checkout-section -->
</div>
@endsection