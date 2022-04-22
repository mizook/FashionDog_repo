@component('mail::message')
# Introduction

<h1>Su contraseña es: {{$datosUsuario}}</h1>
<h1>Se recomienda cambiarla por su seguridad.</h1>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
