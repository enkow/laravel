<div class="form-group">
	{!! Form::label( $field, $name ) !!}
  {!! Form::select( $field, $array, null, array_merge( ['class' => 'form-control dropdown'], $attributes ) ) !!}
</div>
