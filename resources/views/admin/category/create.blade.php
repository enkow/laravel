@extends('admin.template.page')

@section('title')
  Nowa kategoria
@stop

@section('body')

	{{ Form::open( [ 'route' => ['admin.category.store'] ] ) }}

		@include( "admin.category.form" )

		<button type="submit" class="btn btn-success">Dodaj</button>

	{{ Form::close() }}

@stop
