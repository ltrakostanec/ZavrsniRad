{{--@component('mail::message')--}}
{{--# Introduction--}}

{{--Vaša lozinka je {{$OTP}}--}}

{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

{{--Thanks,<br>--}}
{{--{{ config('app.name') }}--}}
{{--@endcomponent--}}

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Višefaktorska autentikacija</h1>
<p>Vaša jednokratna lozinka za autentikaciju je {{$OTP}}
    <br>Valjanost lozinke je 60 sekundi. Lozinka je kreirana {{$vrijeme}}
</p>

</body>
</html>

