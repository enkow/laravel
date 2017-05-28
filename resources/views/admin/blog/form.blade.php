<div class="row">

  <div class="col-sm-8">
		{!! Form::field('Tytuł', 'name') !!}
	</div>

  <div class="col-sm-4">
    {!! Form::img('Zdjęcie', 'photo', [], 'blog') !!}
  </div>

  <div class="col-sm-12">
    {!! Form::dropdown('Tagi', 'tag_list[]', $tags, ['multiple' => 'multiple']) !!}
  </div>

  <div class="col-sm-12">
    {!! Form::textfield('Treść', 'content', [ 'wysiwyg' => 'full' ]) !!}
  </div>

  {!! Form::seo() !!}

</div>
