@extends('web.template.index')

@section('title'){{ 'Archemia' }}@stop
@section('description'){{ 'Archemia' }}@stop
@section('keywords'){{ 'Archemia' }}@stop

@section('body')
  <header style="background-image: url('../img/header.png');">
    <div class="header-content">
      <div class="header-content-inner">
        wnętrza | trendy | inspiracje
        <h1>Lorem ipsum dolor sit amet</h1>
        27.01.2017 | Archemia
        <div class="col-xs-12 mt-70">
          <a href="{{ route('blog.view') }}" class="btn-read-more">czytaj więcej <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </header>

  <section class="bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-5 mx-auto mb-4">
          <div class="blog-img my-4" style="background-image: url('../img/header.png');"></div>
          <div class="my-3">
            <a href="" class="btn-tag">wnętrza</a>
            <a href="" class="btn-tag">trendy</a>
          </div>
          <h5 class="blog-title">Lorem</h5>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nisl eros, elementum ac purus sed, mollis semper ante. Mauris leo enim, luctus sit amet est quis, dignissim mollis felis. Quisque et ultricies velit, tincidunt varius elit. In mattis velit a lorem mollis malesuada. Vestibulum vestibulum cursus euismod. Nullam felis arcu, lobortis vitae pellentesque id, suscipit ut ligula. Etiam congue eleifend sem, nec fringilla ipsum hendrerit non. Nullam at hendrerit lacus, a posuere ipsum.
          <div class="col-xs-12 mt-4">
            <span class="pull-left blog-date">06.12.2017 | Studio Archemia</span>
            <a href="{{ route('blog.view') }}" class="pull-right fs-15">czytaj więcej <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class="col-md-5 mx-auto mb-4">
          <div class="blog-img my-4" style="background-image: url('/images/portfolio/thumbnails/1.jpg');"></div>
          <div class="my-3">
            <a href="" class="btn-tag">inspiracje</a>
          </div>
          <h5 class="blog-title">Lorem</h5>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nisl eros, elementum ac purus sed, mollis semper ante. Mauris leo enim, luctus sit amet est quis, dignissim mollis felis. Quisque et ultricies velit, tincidunt varius elit. In mattis velit a lorem mollis malesuada. Vestibulum vestibulum cursus euismod. Nullam felis arcu, lobortis vitae pellentesque id, suscipit ut ligula. Etiam congue eleifend sem, nec fringilla ipsum hendrerit non. Nullam at hendrerit lacus, a posuere ipsum.
          <div class="col-xs-12 mt-4">
            <span class="pull-left blog-date">14.11.2017 | Studio Archemia</span>
            <a href="{{ route('blog.view') }}" class="pull-right fs-15">czytaj więcej <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class="col-md-5 mx-auto mb-4">
          <div class="blog-img my-4" style="background-image: url('../img/header.png');"></div>
          <div class="my-3">
            <a href="" class="btn-tag">wnętrza</a>
            <a href="" class="btn-tag">trendy</a>
          </div>
          <h5 class="blog-title">Lorem</h5>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nisl eros, elementum ac purus sed, mollis semper ante. Mauris leo enim, luctus sit amet est quis, dignissim mollis felis. Quisque et ultricies velit, tincidunt varius elit. In mattis velit a lorem mollis malesuada. Vestibulum vestibulum cursus euismod. Nullam felis arcu, lobortis vitae pellentesque id, suscipit ut ligula. Etiam congue eleifend sem, nec fringilla ipsum hendrerit non. Nullam at hendrerit lacus, a posuere ipsum.
          <div class="col-xs-12 mt-4">
            <span class="pull-left blog-date">06.12.2017 | Studio Archemia</span>
            <a href="{{ route('blog.view') }}" class="pull-right fs-15">czytaj więcej <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class="col-md-5 mx-auto mb-4">
          <div class="blog-img my-4" style="background-image: url('/images/portfolio/thumbnails/1.jpg');"></div>
          <div class="my-3">
            <a href="" class="btn-tag">inspiracje</a>
          </div>
          <h5 class="blog-title">Lorem</h5>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce nisl eros, elementum ac purus sed, mollis semper ante. Mauris leo enim, luctus sit amet est quis, dignissim mollis felis. Quisque et ultricies velit, tincidunt varius elit. In mattis velit a lorem mollis malesuada. Vestibulum vestibulum cursus euismod. Nullam felis arcu, lobortis vitae pellentesque id, suscipit ut ligula. Etiam congue eleifend sem, nec fringilla ipsum hendrerit non. Nullam at hendrerit lacus, a posuere ipsum.
          <div class="col-xs-12 mt-4">
            <span class="pull-left blog-date">14.11.2017 | Studio Archemia</span>
            <a href="{{ route('blog.view') }}" class="pull-right fs-15">czytaj więcej <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop

@section('scripts')

@stop
