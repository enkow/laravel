<div class="form-group cm-form-upload">
  {!! Form::label( $field, $name ) !!}

  <div class="input-group">
    <span class="input-group-addon upload-preview"><i class="fa fa-picture-o"></i></span>
    {!! Form::text( $field, null, array_merge( [ 'class' => 'form-control uploaded-file-name' ], $attributes ) ) !!}

    <span class="input-group-btn">
      <input type="file" data-name="cm-form--image-{{ $field }}" class="hidden" >
      <button type="button" class="btn btn-primary upload-trigger" data-dir="{{ $dir }}" data-input="cm-form--image-{{ $field }}"> <i class="fa fa-upload"></i> </button>
    </span>
  </div>
</div>
