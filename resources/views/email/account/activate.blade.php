@component('mail::message')
# Hello {name}

Good Day, Your Account has been activated.

# We are excited to have you in the plantify community.



@component('mail::button', ['url' => '/'])
To Plantify
@endcomponent

Thanks From,<br>
{{ config('app.name') }}
@endcomponent
