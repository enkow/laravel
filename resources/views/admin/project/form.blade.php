<div class="row">

  <div class="col-sm-10">
		{!! Form::field('Nazwa', 'name') !!}
	</div>

  <div class="col-sm-2">
    {!! Form::field('Kolejność', 'order') !!}
  </div>

  <div class="col-sm-12">
		{!! Form::textfield('Opis', 'description', ['wysiwyg' => 'standard']) !!}
	</div>

  {!! Form::seo() !!}

</div>
