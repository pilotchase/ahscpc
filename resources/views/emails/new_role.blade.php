@component('mail::message')
{{ $user->fname }},  

The AHSCPC Board of Directors would like to extend a warm welcome to the team! You have been set as the **AHSCPC {{ $role }}** by **{{ $changer }}**. In lieu of this change, your website permissions have been updated to reflect those available for your new role. If you have any questions regarding this change, please contact the AHSCPC President.  

Thanks,<br>
{{ config('app.name') }}
@endcomponent