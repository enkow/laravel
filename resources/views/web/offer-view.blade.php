@extends('web.template.index')

@section('title'){{ $offer->seo_title }}@stop
@section('description'){{ $offer->seo_description }}@stop
@section('keywords'){{ $offer->seo_keywords }}@stop

@section('body')
  <header style="background-image: url('{{ url('img/oferta') }}/{{ $offer->photo }}');">
    <div style="">
      <img src="{{ url('img/ikony/duze') }}/{{ $offer->icon }}" class="offer-icon">
    </div>
  </header>

  <section class="bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto text-center">
            <h1 class="offer-title">{{ $offer->name }}</h1>
        </div>

        <div class="col-md-9 mx-auto">
          {!! $offer->description !!}
          <div class="col-xs-12 mt-75 text-center">
            PRZYKŁAD<br><br>
            <a class="btn portfolio-btn btn-xl sr-button" href="">zobacz</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop

@section('scripts')

@stop
