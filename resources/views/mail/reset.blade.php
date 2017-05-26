@extends('mail.template')

@section( 'title' )
  Reset hasła:
@stop

@section( 'content' )
  Cześć!<br><br>
  Otrzymaliśmy prośbę o zmianę Twojego hasła do konta w panelu administracyjnym.
  Aby ustawić nowe hasło kliknij <a href="{{ route('admin.reset.token', $token) }}">tutaj</a>.<br><br>

  Jeśli to pomyłka i nie chcesz zmieniać swojego hasła, po prostu zignoruj tę wiadomość.<br><br>
@stop

@section( 'foot' )
  Ta wiadomość została wysłana automatycznie ze strony studioarchemia.pl<br>
  Jeżeli nie wiesz dlaczego trafiła do Ciebie skontaktuj <br> się z administratorem strony!
@stop
