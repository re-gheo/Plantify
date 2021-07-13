@component('mail::message')
# Hello {{ $user->first_name }} , 

# Good Day, we are sad to say your Registration for Plantify with "{{  $user->email }}"" has been Dismissed and Deleted.

# " {{ $remark }}."
 
# your are welcome to try again and create a new account.



@component('mail::button', ['url' => '/'])
To Plantify
@endcomponent

Thanks From,<br>
{{ config('app.name') }}
@endcomponent
