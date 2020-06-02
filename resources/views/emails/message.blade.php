@component('mail::message')

Vous avez recu un mail de la part de  <b style="color: blue;"> {{ $nom }}  ( {{ $email }} ) </b>

Message

{{ $message }}

Thanks,<br>

@endcomponent
