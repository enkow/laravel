var previewImageUrl = '/img/' + $( '.cm-form-upload' ).find( 'button.upload-trigger').data('dir') + '/';

$( '.cm-form-upload' ).each( function () {
	var form = $( this ),
		button = form.find( 'button.upload-trigger'),
		defaultTrigger = form.find( 'button.default-trigger'),
		uploadDestination = button.data('dir'),
		fileInput = form.find( 'input[data-name="' + button.data('input') + '"]'),
		nameInput = form.find( 'input.uploaded-file-name' ),
		preview = form.find( '.upload-preview' );

	nameInput.keydown(function( event ) {
		event.preventDefault();
		return false;
	});

	fileInput.change( function () {
		if( file = this.files[0] ) {

			var formData = new FormData();
			formData.append( 'file', file );

			swal({
				title: "Trwa wrzucanie...",
				text: "Już prawie... Już za chwileczkę...",
				showConfirmButton: false
			});

			$.ajaxSetup({
	      headers: {
	          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	      }
	    });

			$.ajax({
				method: "POST",
				url: "/admin/ajax/upload/" + uploadDestination,
				data: formData,
				processData: false,
				contentType: false,
			}).done( function ( data ) {

				swal.close();
				nameInput.val( data.name );

			}).fail( function () {
				swal({ title: 'Coś poszło nie tak!', text: 'Nie udało się wrzucić obrazka, spróbuj ponownie!' });
			}).always( function () {
				fileInput.val();
			});

		}
	});

	preview.click( function () {
			uglipop({
				source:'html',
				content:'<img src="' + previewImageUrl + nameInput.val() + '"></img>'
			});
	});

	button.click( function () {
		fileInput.click();
	});

});
