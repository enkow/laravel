@extends('admin.template.page')

@section('title')
	Edycja kategorii
@stop

@section('body')

	{{ Form::model( $category, [ 'route' => [ 'admin.category.update', $category->id ] ] ) }}

		@include( "admin.category.form" )
		<button type="submit" class="btn btn-success">Zapisz</button>

	{{ Form::close() }}

@stop
