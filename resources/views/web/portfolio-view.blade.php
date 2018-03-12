@extends('web.template.index')

@section('title'){{ $project->seo_title }}@stop
@section('description'){{ $project->seo_description }}@stop
@section('keywords'){{ $project->seo_keywords }}@stop

@section('body')
  @if($project->photos->count())
    <header style="background-image: url('{{ url('img/portfolio') }}/{{ $project->photos()->where('main', '=', 1)->first() ? $project->photos()->where('main', '=', 1)->first()->name : $project->photos->first()->name }}');"></header>
  @endif

  <section class="bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-11 mx-auto mb-5">
          <h1 class="blog-title">{{ $project->name }}</h1>
          {!! $project->description !!}
        </div>
      </div>
    </div>

    <div class="col-md-10 mx-auto my-5">
      <div class="row popup-gallery">
        @foreach ($project->photos as $photo)
          <div class="col-md-4 p-0">
            <a class="portfolio-box" href="{{ url('img/portfolio') }}/{{ $photo->name }}">
              <img src="{{ url('img/portfolio/thumb') }}/{{ $photo->name }}" class="img-thumbnail border-0">
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@stop

@section('scripts')

@stop
