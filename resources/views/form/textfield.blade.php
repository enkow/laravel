<div class="form-group">
	{!! Form::label( $field, $name ) !!}
	{!! Form::textarea( $field, $value, array_merge( ['class' => 'form-control', 'placeholder' => $name, 'rows' => 4 ], $attributes ) ) !!}
</div>
