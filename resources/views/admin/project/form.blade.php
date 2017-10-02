<div class="row">

  <div class="col-sm-12">
		{!! Form::field('Nazwa', 'name') !!}
	</div>

  <div class="col-sm-12">
		{!! Form::textfield('Opis', 'description', ['wysiwyg' => 'standard']) !!}
	</div>

  {!! Form::seo() !!}

</div>
