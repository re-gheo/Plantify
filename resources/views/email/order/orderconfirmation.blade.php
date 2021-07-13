@component('mail::message')
# Hello {name}

# This is confirmation that you have ordered from our site

# Thank you for purchasing on Plantify

Please do expect for it to come in 3-5 days at your registered location



{Details of items and money}

Thank this item for this {store}


@component('mail::button', ['url' => '/'])
To Plantify
@endcomponent

Thanks From,<br>
{{ config('app.name') }}
@endcomponent
