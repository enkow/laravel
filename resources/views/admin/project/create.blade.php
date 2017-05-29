@extends('admin.template.page')

@section('title')
  Nowy wpis do portfolio
@stop

@section('body')

	{{ Form::open( [ 'route' => ['admin.project.store'] ] ) }}

		@include( "admin.project.form" )

		<button type="submit" class="btn btn-success">Dodaj</button>

	{{ Form::close() }}

@stop
