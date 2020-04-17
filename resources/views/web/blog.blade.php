@extends('web.template.index')

@section('title'){{ 'Blog' }}@stop
@section('description'){{ 'Dzielimy się wiedzą z zakresu aranżacji i projektowania wnętrz - Poznaj nas! Na blogu znajdziesz wiele przydatnych artykułów, które pomogą Ci zgłębić temat projektowania i aranżacji wnętrz.' }}@stop
@section('keywords')@stop

@section('styles')
  <style>
    header {
      background-size: contain;
      padding-top: 39.75%;
      background-repeat: no-repeat;
      min-height: 0;
    }
  </style>
@endsection


@section('body')
  @if($first)
    <header style="background-image: url('{{ url('img/blog') }}/{{ $first->photo }}');">
      <div class="header-content" style="position: absolute;bottom: -25px;">
        <div class="header-content-inner">
            <a href="{{ route('blog.view', $first->slug) }}" class="btn-read-more">czytaj więcej <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        </div>
      </div>
    </header>
  @endif

  <section class="bg-white">
    <div class="container">
      <div class="row">
        @foreach($posts as $post)
          <div class="col-md-4 mx-auto mb-4">
            <div class="blog-img my-4" style="background-image: url('{{ url('img/blog/thumb') }}/{{ $post->photo }}');"></div>
            <div class="my-3">
              @foreach($post->tags as $tag)
                <a href="{{ route('tag', $tag->slug) }}" class="btn-tag">{{ $tag->name }}</a>
              @endforeach
            </div>
            <h5 class="blog-title">{{ $post->name }}</h5>
            {{ str_limit(strip_tags($post->content), 200, '...') }}
            <div class="col-xs-12 mt-4">
              <span class="pull-left blog-date">{{ date('d.m.Y', strtotime($post->created_at)) }} | Studio Archemia</span>
              <a href="{{ route('blog.view', $post->slug) }}" class="pull-right fs-15">czytaj więcej <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  @if($paginator['pagesCount'] > 1)
    <div class="col-xs-12 mx-auto text-center my-5">
      @if($paginator['page'] > 1)
        <a href="{{ route('blog.paginate', $paginator['page'] - 1) }}" class="paginate"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Poprzednia</a>
      @endif
      @for($i = 1; $i <= $paginator['pagesCount']; $i++)
        <a href="{{ route('blog.paginate', $i) }}" class="paginate @if($i == $paginator['page']){{ 'active' }}@endif">{{ $i }}</a>
      @endfor
      @if($paginator['page'] != $paginator['pagesCount'])
        <a href="{{ route('blog.paginate', $paginator['page'] + 1) }}" class="paginate">Następna <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
      @endif
    </div>
  @endif
@stop

@section('scripts')

@stop
