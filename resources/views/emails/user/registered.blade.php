@component('mail::message')

از ثبت نام شما در سایت محلی جات سپاسگزاریم.
<br>
مشخصات شما برای ورود به سایت محلی جات به صورت زیر است:
<br>
نام کاربری:
{{$username}}
<br>
رمز عبور:
{{$password}}

@component('mail::button', ['url' => 'https://www.mahalijat.com'])
محلی جات
@endcomponent

با تشکر
<br>
محلی جات
@endcomponent
