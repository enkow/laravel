@extends('admin.template.page')

@section('title')
  Nowy tag
@stop

@section('body')

	{{ Form::open( [ 'route' => ['admin.tag.store'] ] ) }}

		@include( "admin.tag.form" )

		<button type="submit" class="btn btn-success">Dodaj</button>

	{{ Form::close() }}

@stop
