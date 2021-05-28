@component('mail::message')
# Someone posted a review on your product {{$product}}!

You are doing well!

@component('mail::button', ['url' => ''])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
