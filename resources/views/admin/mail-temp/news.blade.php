@component('mail::message')
    Newsletter From Beauty Garage

    @component('mail::button', ['url' => 'link'])
        Click to Login
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
