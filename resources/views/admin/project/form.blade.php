<div class="row">

  <div class="col-sm-8">
		{!! Form::field('Nazwa', 'name') !!}
	</div>

  <div class="col-sm-4">
    {!! Form::dropdown('Rodzaj', 'type', ['PROJEKT', 'REALIZACJA']) !!}
  </div>

  <div class="col-sm-12">
		{!! Form::textfield('Opis', 'description') !!}
	</div>

  {!! Form::seo() !!}

</div>
