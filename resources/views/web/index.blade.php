<!DOCTYPE html>
<html lang="pl">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Grzegorz Stefański">

    <title>Archemia</title>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WDKC3DL');</script>
    <!-- End Google Tag Manager -->

    <!-- Bootstrap core CSS -->
    <link href="{{url('/plugins')}}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom fonts for this template -->
    <link href="{{url('/plugins')}}/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,900" rel="stylesheet">

    <!-- Plugin CSS -->
    <link href="{{url('/plugins')}}/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{url('/css')}}/styles-sg.css" rel="stylesheet">

  </head>

  <body id="page-top">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WDKC3DL" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        {{-- <a class="navbar-brand js-scroll-trigger" href="#page-top">Start Bootstrap</a> --}}
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">O nas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Oferta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#blog">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Kontakt</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead">
      <div class="header-content">
        <div class="header-content-inner">
          {{-- <h1 id="homeHeading">Studio Archemia</h1>
          <hr>
          <p>Laboratorium architektury - projektowanie wnętrz</p>
          <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Find Out More</a> --}}
          <img src="/img/studio-archemia.png" class="home-heading">
          <p class="subtitle">laboratorium architektury | projektowanie wnętrz</p>
        </div>
      </div>
    </header>

    <section class="bg-white" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h2 class="section-heading text-black">O NAS</h2>
            <img src="/img/o-nas.png" class="img-about">
            <p class="text-faded text-black text-center">
              Z wykształcenia jesteśmy architektami i grafikami. Ukończyłyśmy Wydział Architektury i Urbanistyki na Politechnice Krakowskiej oraz Grafikę Komputerową na Akademii Górniczo-Hutniczej w Krakowie. Od ponad dziesięciu lat tworzymy energiczny duet, który świetnie się uzupełnia.<br><br>
              Nasze <strong>projekty wystroju wnętrz</strong> charakteryzuje ciekawy design, styl i klasa. Kładziemy nacisk na ergonomię przestrzeni, tworząc unikalne wnętrza dostosowane do indywidualnych potrzeb i trybu życia klienta. <strong>Aranżacja wnętrz</strong> jest naszą pasją, dlatego stale śledzimy najnowsze trendy pojawiające się na rynku z zakresu nowoczesnych materiałów i technologii. To daje gwarancję, że zaprojektowane przez nas wnętrze będzie nietuzinkowe a inżynierskie wykształcenie dodatkowo pozwoli nam precyzyjnie dopracować każdy techniczny detal.<br><br>
              Specjalizujemy się we wnętrzach nowoczesnych, lubimy minimalizm, styl skandynawski i loftowy. Kierujemy się zasadą, że najlepsze wnętrza to takie, które nie tylko pięknie wyglądają  ale w których wygodnie się mieszka.<br><br>
              Współpracujemy z gronem wyspecjalizowanych fachowców.<br><br>
              Z przyjemnością podejmiemy się zleceń obejmujących <strong>projektowanie wnętrz</strong> prywatnych i publicznych.<br><br>
              Serdecznie zapraszamy do współpracy!<br><br>
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="bg-primary" id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">OFERTA</h2>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          @foreach($offers as $offer)
            <div class="col-lg-3 col-md-6 text-center">
              <div class="service-box">
                <a href="{{ route('offer.view', $offer->slug) }}"><img src="{{ url('img/ikony') }}/{{ $offer->icon }}" class="sr-icons"></i></a>
                <p class="service-txt">{{ $offer->name }}</p>
                <p class="text-center offer-lead">{{ $offer->lead }}</p>
                <a href="{{ route('offer.view', $offer->slug) }}">zobacz <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <section class="p-0" id="portfolio">
      <div class="container-fluid">
        <div class="row no-gutter">
          @foreach($projects as $project)
            <div class="col-lg-4 col-sm-6">
              <a class="portfolio-box" href="{{ route('portfolio.view', $project->slug) }}">
                @if($project->photos->count())
                  <img class="img-fluid" src="{{ url('img/portfolio/thumb') }}/{{ $project->photos()->where('main', '=', 1)->first() ? $project->photos()->where('main', '=', 1)->first()->name : $project->photos->first()->name }}">
                @else
                  <img class="img-fluid" src="{{ url('img/brak-zdjecia.png') }}">
                @endif
                <div class="portfolio-box-caption">
                  <div class="portfolio-box-caption-content">
                    <div class="project-name">
                      {{ $project->name }}
                    </div>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <div class="call-to-action bg-primary">
      <div class="container text-center">
        <a class="btn portfolio-btn btn-xl sr-button" href="{{ route('portfolio.all') }}">zobacz więcej</a>
      </div>
    </div>

    <section class="bg-white" id="blog">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-black">NAJNOWSZE WPISY NA BLOGU</h2>
          </div>
          <div class="col-lg-12 mx-auto">
            <div class="row">
                @foreach($posts as $post)
                  <div class="col-md-4">
                    <img src="{{ url('img/blog/thumb') }}/{{ $post->photo }}" class="img-thumbnail border-0">
                    <h5 class="blog-title">{{ $post->name }}</h5>
                    <p class="text-justify fs-15">{{ str_limit(strip_tags($post->content), 275, '...') }}</p>
                    <div class="clearfix"></div>
                    <div class="col-xs-12 mt-4">
                      <span class="pull-left blog-date">{{ date('d.m.Y', strtotime($post->created_at)) }} | Studio Archemia</span>
                      <a href="{{ route('blog.view', $post->slug) }}" class="pull-right fs-15">czytaj więcej <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                  </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>

      <div class="container text-center mt-5 mb-3">
        <a class="btn portfolio-btn btn-xl sr-button" href="{{ route('blog') }}">przejdź do bloga</a>
      </div>
    </section>

    <section id="contact" class="bg-primary">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading">KONTAKT</h2>
            @if( session('success') )
            	<div class="alert alert-success col-xs-12" style="height:50px;">
            		<p> {{ session('success') }} </p>
            	</div>
            @endif
            @if(isset($errors))
            	@foreach($errors->all() as $error)
            		<div class="alert alert-danger col-xs-12" style="height:50px;">
            			<p> {{ $error }} </p>
            		</div>
            	@endforeach
            @endif
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <div class="row">
              <div class="col-xs-6 ml-auto text-right">
                <img src="/img/kontakt.png" class="home-contact">
              </div>
              <div class="col-xs-6 mx-auto text-left">
                <a href="tel:+48605402676">605 402 676</a>
                <br><br>
                <a href="mailto:biuro@studioarchemia.pl">biuro@studioarchemia.pl</a>
                <br><br>
                ul. Piłsudskiego 17/3<br>
                31-111 Kraków
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-xs-6 ml-auto text-right">
                <img src="/img/wtyczka.png" class="home-contact-2">
              </div>
              <div class="col-xs-6 mx-auto text-left">
                <a href="https://www.facebook.com/StudioArchemia/" target="_blank"><img src="/img/facebook.png" class="home-social"></a>
                <a href="https://pl.pinterest.com/studioarchemia/" target="_blank"><img src="/img/pinterest.png" class="home-social"></a>
                <a href="https://www.instagram.com/studioarchemia/" target="_blank"><img src="/img/instagram.png" class="home-social"></a>
              </div>
            </div>
          </div>
          <div class="col-lg-1 mx-auto text-center">
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <form action="{{ route('contact') }}" method="POST">
              {{ csrf_field() }}
              <input type="text" name="name" class="form-home" placeholder="imię i nazwisko" required>
              <input type="email" name="email" class="form-home" placeholder="adres email" required>
              <textarea class="form-home" name="message" placeholder="treść" rows="5" required></textarea>
              <button type="submit" class="btn portfolio-btn sent-btn btn-xl sr-button">wyślij</button>
            </form>
          </div>
        </div>
      </div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2561.39421473237!2d19.92738245104111!3d50.060178479322445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165b0c86da0ea7%3A0x4851f2d203247a97!2sJ%C3%B3zefa+Pi%C5%82sudskiego+17%2C+33-332+Krak%C3%B3w!5e0!3m2!1spl!2spl!4v1506960879043" width="100%" height="600" frameborder="0" allowfullscreen class="border-0"></iframe>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="{{url('/plugins')}}/jquery/jquery.min.js"></script>
    <script src="{{url('/plugins')}}/popper/popper.min.js"></script>
    <script src="{{url('/plugins')}}/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="{{url('/plugins')}}/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{url('/plugins')}}/scrollreveal/scrollreveal.min.js"></script>
    <script src="{{url('/plugins')}}/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="{{url('/js')}}/scripts-sg.js"></script>

  </body>

</html>
