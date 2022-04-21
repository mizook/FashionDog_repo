@component('mail::message')
# Introduction

The body of your message.
Su contraseña es: {{$datosUsuario}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
