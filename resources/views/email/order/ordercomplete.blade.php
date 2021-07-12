@component('mail::message')
# Hello {name}

# this Email is to notify you that your order {} is complete.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
