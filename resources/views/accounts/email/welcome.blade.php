@component('mail::message')
# Hello {{$user->name}},

Your account is created successfully.

@component('mail::button', ['url' => route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
