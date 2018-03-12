<div class="row">

  <div class="col-sm-5">
		{!! Form::field('Nazwa', 'name') !!}
	</div>

  <div class="col-sm-4">
    {!! Form::img('Zdjęcie', 'photo', [], 'oferta') !!}
  </div>

  <div class="col-sm-3">
    {!! Form::dropdown('Ikona', 'icon', $icons) !!}
  </div>

  <div class="col-sm-12">
		{!! Form::field('Krótki opis', 'lead') !!}
	</div>

  <div class="col-sm-12">
    {!! Form::textfield('Opis', 'description', [ 'wysiwyg' => 'full' ]) !!}
  </div>

  {!! Form::seo() !!}

</div>
