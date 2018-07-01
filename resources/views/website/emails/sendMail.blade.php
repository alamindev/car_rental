@component('mail::message')Please click the link below

<a href="{{ route('sendEmailDone',['email'=>$user->email, 'verifyToken'=>$user->verifyToken]) }}">click hire</a>


<br> Thanks,
<br> Dawn Car Rental @endcomponent