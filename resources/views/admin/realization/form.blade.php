<div class="row">

  <div class="col-sm-8">
		{!! Form::field('Nazwa', 'name') !!}
	</div>

  <div class="col-sm-2">
    <div class="form-group">
    	{!! Form::label('main', 'Wyświetl na SG') !!}
    	{!! Form::select('main', [0 => 'nie', 1 => 'tak'], null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="col-sm-2">
    {!! Form::field('Kolejność', 'order') !!}
  </div>

  <div class="col-sm-12">
		{!! Form::textfield('Opis', 'description', ['wysiwyg' => 'standard']) !!}
	</div>

  {!! Form::seo() !!}

</div>
