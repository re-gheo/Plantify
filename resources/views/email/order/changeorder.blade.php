@component('mail::message')
# Introduction

This Email is to notfy you that you order has be {Type canceled or refunded}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
