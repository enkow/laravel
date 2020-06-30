@extends('admin.template.page')

@section('title')
  Nowa realizacja
@stop

@section('body')

	{{ Form::open( [ 'route' => ['admin.realization.store'] ] ) }}

		@include( "admin.realization.form" )

		<button type="submit" class="btn btn-success">Dodaj</button>

	{{ Form::close() }}

@stop
