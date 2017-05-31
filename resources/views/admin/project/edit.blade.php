@extends('admin.template.page')

@section('title')
	Edycja portfolio
@stop

@section('body')

	{{ Form::model( $project, [ 'route' => [ 'admin.project.update', $project->id ] ] ) }}

		@include( "admin.project.form" )
		<button type="submit" class="btn btn-success">Zapisz</button>

	{{ Form::close() }}

	<br><hr>

	<div class="cm-gallery" id="id">
    <div class="cm-gallery-headline">
      Zdjęcia
    </div>

    <div class="cm-gallery-container">
      <div class="cm-trigger"> <span class="cm-trigger-content">+</span> </div>
    </div>

    <div class="cm-gallery-controls">
      <input type="file" class="cm-galler-upload" multiple="">
    </div>
  </div>
@stop

@section('scripts')
	<script>
		var galleryEndPoints = {
			upload: "{{ route('ajax.upload.gallery', $project->id) }}",
			remove: "{{ route('ajax.remove.gallery', ':id') }}"
		};
		var galleryCurrentImages = {!! $photos !!};

		var gallery = new CMGallery( "#id", galleryEndPoints );
		gallery.loadExisting( galleryCurrentImages );
	</script>
@stop
