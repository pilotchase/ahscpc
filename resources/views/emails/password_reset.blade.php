@component('mail::message')
{{ $user->fname }},

This is an automated notification to inform you that your password has been reset. Your new password is: **{{ $password }}**.  

Thanks,<br>
{{ config('app.name') }}
@endcomponent