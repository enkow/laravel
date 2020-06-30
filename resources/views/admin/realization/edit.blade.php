@extends('admin.template.page')

@section('title')
	Edycja realizacji
@stop

@section('body')

	<style>
		.cm-photo-main {
			position: absolute;
			top: 0;
			left: 0;
			background: #307C4C;
			color: #fff;
			padding: 3px 9px;
			cursor: pointer;
			border-width: 0 0 1px 1px;
			border-color: rgba( 220, 220, 220, .3 );
			border-style: solid;
		}
		.cm-main-photo {
			border: 10px solid #000 !important;
		}
	</style>

	{{ Form::model( $realization, [ 'route' => [ 'admin.realization.update', $realization->id ] ] ) }}

		@include( "admin.realization.form" )
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
			upload: "{{ route('ajax.upload.gallery', $realization->id) }}",
			remove: "{{ route('ajax.remove.gallery', ':id') }}",
			main: "{{ route('ajax.main.gallery', ':id') }}",
		};
		@foreach ($categories as $category)
			var galleryId = {{ $category->id }};
			var galleryCurrentImages = {!! $photos !!}[{{ $category->id }}];

			var gallery = new CMGallery("#id" + galleryId, galleryEndPoints);
			gallery.loadExisting( galleryCurrentImages );
		@endforeach
	</script>
@stop
