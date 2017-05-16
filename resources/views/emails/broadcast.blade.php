@component('mail::message')
{{ $message }}
<br><br>
<hr>
This message was sent at the request of {{ $sender }}.
@endcomponent