<div class="form-group">
	{!! Form::label( $field, $name ) !!}
	{!! Form::password( $field, array_merge( ['class' => 'form-control', 'placeholder' => $name ], $attributes ) ) !!}
</div>
