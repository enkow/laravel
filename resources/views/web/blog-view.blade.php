@extends('web.template.index')

@section('title'){{ 'Archemia' }}@stop
@section('description'){{ 'Archemia' }}@stop
@section('keywords'){{ 'Archemia' }}@stop

@section('body')
  <header style="background-image: url('{{ url('img/blog') }}/{{ $post->photo }}');"></header>

  <section class="bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-10 mx-auto text-center">
          @foreach($post->tags as $tag)
            <a href="{{ route('tag', $tag->slug) }}" class="btn-tag">{{ $tag->name }}</a>
          @endforeach
          <h1 class="blog-title">{{ $post->name }}</h1>
        </div>

        <div class="col-md-9 mx-auto">
          {!! $post->content !!}
          <div class="col-xs-12 mt-4">
            <span class="pull-left blog-date">{{ date('d.m.Y', strtotime($post->created_at)) }} | Studio Archemia</span>
            <a href="" class="pull-right fs-12 ml-3">Udostępnij <i class="fa fa-facebook-square fs-12" aria-hidden="true"></i></a>
            <a href="" class="pull-right fs-12">Skomentuj <i class="fa fa-comment fs-12" aria-hidden="true"></i></a>
          </div>
        </div>

        <div class="col-md-10 mx-auto mt-75">
          <div class="col-xs-12 separate">WIĘCEJ</div>
          <div class="row">
            @foreach($posts as $item)
              <div class="col-md-5 mr-auto mb-4">
                <div class="blog-img my-4" style="background-image: url('{{ url('img/blog/thumb') }}/{{ $item->photo }}');"></div>
                <div class="my-3">
                  @foreach($item->tags as $tag)
                    <a href="{{ route('tag', $tag->slug) }}" class="btn-tag">{{ $tag->name }}</a>
                  @endforeach
                </div>
                <h5 class="blog-title">{{ $item->name }}</h5>
                {{ str_limit(strip_tags($item->content), 450, '...') }}
                <div class="col-xs-12 mt-4">
                  <span class="pull-left blog-date">{{ date('d.m.Y', strtotime($item->created_at)) }} | Studio Archemia</span>
                  <a href="{{ route('blog.view', $item->slug) }}" class="pull-right fs-15">czytaj więcej <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@stop

@section('scripts')

@stop
