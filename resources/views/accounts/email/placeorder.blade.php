@component('mail::message')
# Hello {{$orders->user->name}}

Order is placed successfully.



Thanks,<br>
{{ config('app.name') }}
@endcomponent
