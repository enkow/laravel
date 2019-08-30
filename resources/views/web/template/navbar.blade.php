<a class="navbar-brand js-scroll-trigger" href="{{ route('home') }}"><img src="/img/logo.png"></a>
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="{{ route('blog.view', 'cennik-projektowanie-wnetrz') }}">Cennik</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('home') }}#about">O nas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('home') }}#services">Oferta</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('portfolio.all') }}">Portfolio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('blog') }}">Blog</a>
        </li>
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{ route('home') }}#contact">Kontakt</a>
        </li>
    </ul>
</div>
