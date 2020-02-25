@component('mail::message')
# Comment Updated

Hello {{ $comment -> user -> name }},

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
