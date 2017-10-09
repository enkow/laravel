<!DOCTYPE html>
<html lang="pl">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Grzegorz Stefański">

    <title>Archemia</title>

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
        </div>
      </div>
    </header>

    <section class="bg-white" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="section-heading text-black">O NAS</h2>
            <img src="/img/o-nas.png" class="img-about">
            <p class="text-faded text-black">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris euismod nec turpis in interdum. Nulla placerat semper nunc, non imperdiet eros porta id. In hac habitasse platea dictumst. Mauris ullamcorper felis quis dapibus volutpat. Ut semper molestie magna ac faucibus. Ut nec aliquam justo. Aliquam at ultrices libero. Sed id quam in metus pellentesque ornare tincidunt eget leo. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.Mauris elementum vestibulum nibh, vitae efficitur sapien venenatis et. Vivamus luctus dolor eu orci ornare iaculis. Mauris eu vulputate lacus. Nam vehicula at velit eget sodales. Vivamus vitae consequat eros, a dictum nisl. Nam tempor tristique quam in maximus. Quisque molestie commodo diam, at pulvinar felis lacinia eget. Aliquam mattis eleifend tortor in efficitur. Donec enim felis, convallis id diam sed, pretium hendrerit tortor. Pellentesque nec nulla vel magna placerat ornare.
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
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <img src="/img/ikony/zarowka.png" class="sr-icons"></i>
              <p class="service-txt">Projekt koncepcyjny</p>
              <a href="{{ route('offer.view') }}">zobacz <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <img src="/img/ikony/pedzel.png" class="sr-icons"></i>
              <p class="service-txt">Projekt kompleksowy</p>
              <a href="{{ route('offer.view') }}">zobacz <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <img src="/img/ikony/lupa.png" class="sr-icons"></i>
              <p class="service-txt">Nadzór autorski</p>
              <a href="{{ route('offer.view') }}">zobacz <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 text-center">
            <div class="service-box">
              <img src="/img/ikony/monitor.png" class="sr-icons"></i>
              <p class="service-txt">Projekt online</p>
              <a href="{{ route('offer.view') }}">zobacz <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="p-0" id="portfolio">
      <div class="container-fluid">
        <div class="row no-gutter popup-gallery">
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="images/portfolio/fullsize/1.jpg">
              <img class="img-fluid" src="images/portfolio/thumbnails/1.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-name">
                    projekt wnętrza domu w Wieliczce
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="images/portfolio/fullsize/2.jpg">
              <img class="img-fluid" src="images/portfolio/thumbnails/2.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-name">
                    projekt wnętrza domu w Wieliczce
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="images/portfolio/fullsize/3.jpg">
              <img class="img-fluid" src="images/portfolio/thumbnails/3.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-name">
                    projekt wnętrza domu w Wieliczce
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="images/portfolio/fullsize/4.jpg">
              <img class="img-fluid" src="images/portfolio/thumbnails/4.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-name">
                    projekt wnętrza domu w Wieliczce
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="images/portfolio/fullsize/5.jpg">
              <img class="img-fluid" src="images/portfolio/thumbnails/5.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-name">
                    projekt wnętrza domu w Wieliczce
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="images/portfolio/fullsize/6.jpg">
              <img class="img-fluid" src="images/portfolio/thumbnails/6.jpg" alt="">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-name">
                    projekt wnętrza domu w Wieliczce
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>

    <div class="call-to-action bg-primary">
      <div class="container text-center">
        <a class="btn portfolio-btn btn-xl sr-button" href="{{ route('portfolio') }}">zobacz więcej</a>
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
                <div class="col-md-4">
                  <img src="images/portfolio/thumbnails/1.jpg" class="img-thumbnail border-0">
                  <h5 class="blog-title">Lorem</h5>
                  <p class="text-justify fs-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris euismod nec turpis in interdum. Nulla placerat semper nunc, non imperdiet eros porta id. In hac habitasse platea dictumst. Mauris ullamcorper felis quis dapibus volutpat. Ut semper molestie magna ac faucibus. Ut nec aliquam justo.</p>
                  <div class="clearfix"></div>
                  <div class="col-xs-12 mt-4">
                    <span class="pull-left blog-date">06.12.2017 | Studio Archemia</span>
                    <a href="{{ route('blog.view') }}" class="pull-right fs-15">czytaj więcej <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                  </div>
                </div>
                <div class="col-md-4">
                  <img src="images/portfolio/thumbnails/1.jpg" class="img-thumbnail border-0">
                  <h5 class="blog-title">Lorem</h5>
                  <p class="text-justify fs-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris euismod nec turpis in interdum. Nulla placerat semper nunc, non imperdiet eros porta id. In hac habitasse platea dictumst. Mauris ullamcorper felis quis dapibus volutpat. Ut semper molestie magna ac faucibus. Ut nec aliquam justo.</p>
                  <div class="clearfix"></div>
                  <div class="col-xs-12 mt-4">
                    <span class="pull-left blog-date">06.12.2017 | Studio Archemia</span>
                    <a href="{{ route('blog.view') }}" class="pull-right fs-15">czytaj więcej <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                  </div>
                </div>
                <div class="col-md-4">
                  <img src="images/portfolio/thumbnails/1.jpg" class="img-thumbnail border-0">
                  <h5 class="blog-title">Lorem</h5>
                  <p class="text-justify fs-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris euismod nec turpis in interdum. Nulla placerat semper nunc, non imperdiet eros porta id. In hac habitasse platea dictumst. Mauris ullamcorper felis quis dapibus volutpat. Ut semper molestie magna ac faucibus. Ut nec aliquam justo.</p>
                  <div class="clearfix"></div>
                  <div class="col-xs-12 mt-4">
                    <span class="pull-left blog-date">06.12.2017 | Studio Archemia</span>
                    <a href="{{ route('blog.view') }}" class="pull-right fs-15">czytaj więcej <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                  </div>
                </div>
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
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center">
            <div class="row">
              <div class="col-xs-6 ml-auto text-right">
                <img src="/img/kontakt.png" class="home-contact">
              </div>
              <div class="col-xs-6 mx-auto text-left">
                605 402 676
                <br><br>
                biuro@studioarchemia.pl
                <br><br>
                ul. Piłsudzkiego 17/3<br>
                31-111 Kraków
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-xs-6 ml-auto text-right">
                <img src="/img/wtyczka.png" class="home-contact-2">
              </div>
              <div class="col-xs-6 mx-auto text-left">
                <a href=""><img src="/img/facebook.png" class="home-social"></a>
                <a href=""><img src="/img/pinterest.png" class="home-social"></a>
                <a href=""><img src="/img/instagram.png" class="home-social"></a>
              </div>
            </div>
          </div>
          <div class="col-lg-1 mx-auto text-center">
          </div>
          <div class="col-lg-4 mr-auto text-center">
            <form action="" method="GET">
              <input type="text" name="name" class="form-home" placeholder="imię i nazwisko" required>
              <input type="email" name="email" class="form-home" placeholder="adres email" required>
              <textarea class="form-home" name="message" placeholder="email" rows="5" required></textarea>
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
