@component('mail::message')
    # Success Operation
    You Successfully Add  {{$data['data']->name}}  .
    Thanks,
    {{ config('app.name') }}
@endcomponent

