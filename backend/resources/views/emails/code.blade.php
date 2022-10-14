@component('mail::message')
    Your verify code  {{ $code }}

    @component('mail::button', ['url' => ''])
        {{ $code }}
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
