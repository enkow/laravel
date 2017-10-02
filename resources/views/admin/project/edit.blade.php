@extends('admin.template.page')

@section('title')
	Edycja portfolio
@stop

@section('body')

	{{ Form::model( $project, [ 'route' => [ 'admin.project.update', $project->id ] ] ) }}

		@include( "admin.project.form" )
		<button type="submit" class="btn btn-success">Zapisz</button>

	{{ Form::close() }}
	<br>

	@foreach ($categories as $category)
		<hr>
		<div class="cm-gallery" id="id{{ $category->id }}">
	    <div class="cm-gallery-headline">
	      Zdjęcia ({{ $category->name }})
	    </div>

	    <div class="cm-gallery-container">
	      <div class="cm-trigger"> <span class="cm-trigger-content">+</span> </div>
	    </div>

	    <div class="cm-gallery-controls">
	      <input type="file" class="cm-galler-upload" multiple="">
	    </div>
	  </div>
	@endforeach
@stop

@section('scripts')
	<script>
		var galleryEndPoints = {
			upload: "{{ route('ajax.upload.gallery', $project->id) }}",
			remove: "{{ route('ajax.remove.gallery', ':id') }}"
		};
		@foreach ($categories as $category)
			var galleryId = {{ $category->id }};
			var galleryCurrentImages = {!! $photos !!}[{{ $category->id }}];

			var gallery = new CMGallery("#id" + galleryId, galleryEndPoints);
			gallery.loadExisting( galleryCurrentImages );
		@endforeach
	</script>
@stop
