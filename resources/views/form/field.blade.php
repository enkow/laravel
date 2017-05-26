<div class="form-group">
	{!! Form::label( $field, $name ) !!}
	{!! Form::text( $field, $value, array_merge( ['class' => 'form-control', 'placeholder' => $name ], $attributes ) ) !!}
</div>
