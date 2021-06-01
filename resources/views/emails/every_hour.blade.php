@component('mail::message')
    # Every Hour Mail
    {{$data}}  .
    Thanks,
    {{ config('app.name') }}
@endcomponent

