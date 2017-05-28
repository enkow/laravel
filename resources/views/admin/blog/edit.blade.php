@extends('admin.template.page')

@section('title')
	Edycja posta
@stop

@section('body')

	{{ Form::model( $blog, [ 'route' => [ 'admin.blog.update', $blog->id ] ] ) }}

		@include( "admin.blog.form" )
		<button type="submit" class="btn btn-success">Zapisz</button>

	{{ Form::close() }}

@stop

@section('scripts')
  <script type="text/javascript">
    $(".dropdown").select2();
  </script>
@stop
