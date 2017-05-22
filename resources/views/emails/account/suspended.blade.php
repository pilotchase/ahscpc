@component('mail::message')
{{ $user->fname }},  

This is an automated notification to inform you that your membership has been suspended by {{ $by->name . ', ' . $by->role }}. During this period, you will be unable to login to the website or forums. Your suspension details are as follows.  

@component('mail::panel')
    **Suspension Issuer:** {{ $by->name }}  
    **Reason:** {{ $reason }}
@endcomponent

If you wish to appeal your suspension, please email compliance@ahscpc.org.  

Thanks,<br>
{{ config('app.name') }}
@endcomponent