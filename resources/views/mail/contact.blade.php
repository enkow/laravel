@extends('mail.template')

@section( 'title' )
  Wiadomość z formularza kontaktowego:
@stop

@section('content')
  OD: {{ $name }} {{ sprintf('<%s>', $email) }}<br><br>

  {{ $msg }}
@stop

@section( 'foot' )
  Ta wiadomość została wysłana automatycznie ze strony studioarchemia.pl<br>
  Jeżeli nie wiesz dlaczego trafiła do Ciebie skontaktuj <br> się z administratorem strony!
@stop
