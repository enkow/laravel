@extends('admin.template.page')

@section('title')
	Edycja posta
@stop

@section('body')

	{{ Form::model( $tag, [ 'route' => [ 'admin.tag.update', $tag->id ] ] ) }}

		@include( "admin.tag.form" )
		<button type="submit" class="btn btn-success">Zapisz</button>

	{{ Form::close() }}

@stop
