<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Grzegorz Stefański">

    <title>@yield('title') - Studio ARCHEMIA Kraków, Kielce</title>

    <link href="{{url('/plugins')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('/plugins')}}/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,900" rel="stylesheet">
    <link href="{{url('/plugins')}}/magnific-popup/magnific-popup.css" rel="stylesheet">
    <link href="{{url('/css')}}/styles.css" rel="stylesheet">
    <style>
      @media screen and (max-width: 767px) {
        .center-xs {
          text-align: center;
        }
      }
    </style>
    @yield('styles')
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        @include('web.template.navbar')
      </div>
    </nav>

    @yield('body')

    <section id="footer" class="bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 center-xs" style="font-size:12px;margin-bottom:30px;">
            ZOBACZ NASZE:<br>
            <a href="{{ route('portfolio', 'kuchnie') }}">- aranżacja kuchni | projekty kuchni</a><br>
            <a href="{{ route('portfolio', 'salony') }}">- aranżacja salonu | projekty salonu</a><br>
            <a href="{{ route('portfolio', 'sypialnie') }}">- aranżacja sypialni | projekty sypialni</a><br>
            <a href="{{ route('portfolio', 'lazienki') }}">- aranżacja łazienki | projekty łazienki</a><br>
            <a href="{{ route('portfolio', 'pokoje-dzieciece') }}">- aranżacja pokoju dziecka | projekty pokoju dziecka</a><br>
          </div>
          <div class="col-lg-4 col-md-6 center-xs" style="margin-bottom:30px;">
            <span style="margin-right: 20px;white-space: nowrap;line-height:35px;">
              <i class="fa fa-mobile" aria-hidden="true" style="margin-right:7px;margin-left:3px;"></i>
              <a href="tel:+48605402676">605 402 676</a>
            </span>
            <span style="margin-right: 20px;white-space: nowrap;line-height:35px;">
              <i class="fa fa-envelope" aria-hidden="true" style="margin-right:7px;"></i>
              <a href="mailto:biuro@studioarchemia.pl">biuro@studioarchemia.pl</a>
            </span>
            <span style="margin-right: 20px;white-space: nowrap;line-height:35px;">
              <i class="fa fa-map-marker" aria-hidden="true" style="margin-right:7px;margin-left:3px;"></i>
              ul. Piłsudskiego 17/3, 31-111 Kraków
            </span>
          </div>
          <div class="col-lg-4 col-md-12 text-center">
            <div class="col-xs-12" style="line-height:50px;">
              Obserwuj nas!
            </div>
            <a href="https://www.facebook.com/StudioArchemia/" target="_blank"><img src="/img/facebook.png" class="home-social"></a>
            <a href="https://pl.pinterest.com/studioarchemia/" target="_blank"><img src="/img/pinterest.png" class="home-social"></a>
            <a href="https://www.instagram.com/studioarchemia/" target="_blank"><img src="/img/instagram.png" class="home-social"></a>
          </div>
        </div>
      </div>
    </section>

    <script src="{{url('/plugins')}}/jquery/jquery.min.js"></script>
    <script src="{{url('/plugins')}}/popper/popper.min.js"></script>
    <script src="{{url('/plugins')}}/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{url('/plugins')}}/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{url('/plugins')}}/scrollreveal/scrollreveal.min.js"></script>
    <script src="{{url('/plugins')}}/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{url('/js')}}/scripts.min.js"></script>
    @yield('scripts')
  </body>
</html>
