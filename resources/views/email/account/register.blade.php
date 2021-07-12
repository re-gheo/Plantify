@component('mail::message')

# Hello {name}
# Thank you for applying for an account.
# You had submitted your detail to Plantify to register an Account on this email:{email} .
#  Your account is currently pending approval by the site administrator.

 In the mean time please do see our <u>articles</u> for further question and visit our <u>site</u> to seach more for products and learn more about plants


Thanks From,<br>
{{ config('app.name') }}
@endcomponent
