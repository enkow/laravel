@extends('web.template.index')

@section('title'){{ 'Archemia' }}@stop
@section('description'){{ 'Archemia' }}@stop
@section('keywords'){{ 'Archemia' }}@stop

@section('body')
  <style>
    .img-fluid {
      height: fit-content;
    }
  </style>
  <section class="bg-white p-0 mb-5">
    <div class="col-md-10 mx-auto text-center">
        <h1 class="offer-title">PORTFOLIO</h1>
    </div>
    <div class="col-xs-12 mx-auto text-center my-5">
      <a href="{{ route('portfolio.all') }}" class="tag-link mr-5">WSZYSTKO</a>
      @foreach($categories as $item)
        <a href="{{ route('portfolio', $item->slug) }}" class="tag-link mr-5 @if($item->id == $category->id){{ 'active' }}@endif">{{ $item->name }}</a>
      @endforeach
    </div>
    <div class="container-fluid">
      <div class="row no-gutter popup-gallery">
        @foreach($photos as $photo)
          <div class="col-lg-4 col-sm-6">
            <a class="portfolio-box" href="{{ url('img/portfolio') }}/{{ $photo->name }}">
              <img class="img-fluid" src="{{ url('img/portfolio/thumb') }}/{{ $photo->name }}">
              <div class="portfolio-box-caption">
                <div class="portfolio-box-caption-content">
                  <div class="project-name">
                    {{ $photo->project->name }}
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
        <a href="{{ route('portfolio.paginate', [$category->slug, $paginator['page'] - 1]) }}" class="paginate"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Poprzednia</a>
      @endif
      @for($i = 1; $i <= $paginator['pagesCount']; $i++)
        <a href="{{ route('portfolio.paginate', [$category->slug, $i]) }}" class="paginate @if($i == $paginator['page']){{ 'active' }}@endif">{{ $i }}</a>
      @endfor
      @if($paginator['page'] != $paginator['pagesCount'])
        <a href="{{ route('portfolio.paginate', [$category->slug, $paginator['page'] + 1]) }}" class="paginate">Następna <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
      @endif
    </div>
  @endif
@stop

@section('scripts')

@stop
