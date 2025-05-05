@component('mail::message')
# Recuperación de contraseña

Has solicitado restablecer tu contraseña.  
Tu **código de validación** es:

@component('mail::panel')
{{ $code }}
@endcomponent

Este código expirará en 30 minutos.

Si no solicitaste este código, ignora este correo.

Gracias,<br>
{{ config('app.name') }}
@endcomponent
