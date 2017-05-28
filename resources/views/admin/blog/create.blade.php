@extends('admin.template.page')

@section('title')
  Nowy post
@stop

@section('body')

	{{ Form::open( [ 'route' => ['admin.blog.store'] ] ) }}

		@include( "admin.blog.form" )

		<button type="submit" class="btn btn-success">Dodaj</button>

	{{ Form::close() }}

@stop

@section('scripts')
  <script type="text/javascript">
    $(".dropdown").select2();
  </script>
@stop
