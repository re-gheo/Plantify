@component('mail::message')
# Introduction

# This Email is to notify you that you have successfully refunded your pruchase

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
