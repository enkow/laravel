@extends('web.template.index')

@section('title'){{ 'Archemia' }}@stop
@section('description'){{ 'Archemia' }}@stop
@section('keywords'){{ 'Archemia' }}@stop

@section('body')
  <section class="bg-white p-0">
    <div class="col-md-10 mx-auto text-center">
        <h1 class="offer-title">PORTFOLIO</h1>
    </div>
    <div class="col-xs-12 mx-auto text-center my-5">
      <a href="{{ route('portfolio.all') }}" class="tag-link mr-5 active">WSZYSTKO</a>
      @foreach($categories as $category)
        <a href="{{ route('portfolio', $category->slug) }}" class="tag-link mr-5">{{ $category->name }}</a>
      @endforeach
    </div>
    <div class="container-fluid">
      <div class="row no-gutter">
        @foreach($projects as $project)
          <div class="col-lg-4 co l-sm-6">
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

  @if($paginator['pagesCount'] > 1)
    <div class="col-xs-12 mx-auto text-center my-5">
      @if($paginator['page'] > 1)
        <a href="{{ route('portfolio.all.paginate', $paginator['page'] - 1) }}" class="paginate"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Poprzednia</a>
      @endif
      @for($i = 1; $i <= $paginator['pagesCount']; $i++)
        <a href="{{ route('portfolio.all.paginate', $i) }}" class="paginate @if($i == $paginator['page']){{ 'active' }}@endif">{{ $i }}</a>
      @endfor
      @if($paginator['page'] != $paginator['pagesCount'])
        <a href="{{ route('portfolio.all.paginate', $paginator['page'] + 1) }}" class="paginate">Następna <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
      @endif
    </div>
  @endif
@stop

@section('scripts')

@stop
