@component('mail::message')
{{ $user->fname }},  

Welcome to the Acalanes High School Computer Programing Club! We are an inclusive community, dedicated to advancing the use of technology in education, and in a global society.

We have processed your membership with the following information:  

@component('mail::panel')
    **Student ID:** {{ $user->student_id }}  
    **Email:** {{ $user->email }}  
    **Temporary Password:** {{ $password }}  
    **Full Name:** {{ $user->fname . ' ' . $user->lname }}
@endcomponent

We have also made you an account on our forums.

@component('mail::panel')
    **Username:** {{ $user->fname . $user->lname }}  
    **Password:** {{ $password }}  
    **Link:** https://talk.ahscpc.org
@endcomponent

Please visit our website https://ahscpc.org to login, using your email address, and supplied password. For security reasons, we recommend you change your password upon your initial login.  

We are excited that you are with us, and we encourage you to get to know other members as well as club management. If you have any questions,
please don't hesitate to reach out.  

Thanks,<br>
{{ config('app.name') }}
@endcomponent