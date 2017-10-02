function sconfirm( text, success, error ) {

	swal({
		title: "Jesteś pewny?",
		text: text,
		type: "warning",
		confirmButtonColor: "#DD6B55",
		showCancelButton: true,
		confirmButtonText: "Tak, jestem pewny!",
		cancelButtonText: "Anuluj!",
		closeOnConfirm: true,
		closeOnCancel: true
	}, function( confirmed ){
		if( confirmed ) {
			success();
		} else {
			if( typeof error != 'undefined' ) {
				error();
			} else {
				return false;
			}
		}
	});

}

/**
 * CMGallery, simple script with pure js.
 * Dynamic uploading and managing gallery.
 */
function CMGallery( selector, endpoints ) {

	var gallery;

	this.endpoints = endpoints;

	this.selector = selector;

	this.elements = {};

	this.inProgress = false;

	this.category = selector.replace(/^\D+/g, '');

	this.bootstrap = function () {

		gallery = this;

		this.elements[ 'gallery' ] = document.querySelector( this.selector+'.cm-gallery');
		this.elements[ 'container' ] = this.elements.gallery.querySelector('.cm-gallery-container');
		this.elements[ 'trigger' ] = this.elements.gallery.querySelector('.cm-gallery-container .cm-trigger');
		this.elements[ 'controls' ] = this.elements.gallery.querySelector('.cm-gallery-controls');
		this.elements[ 'input' ] = this.elements.gallery.querySelector('.cm-gallery-controls .cm-galler-upload');

		this.bindHandlers();
	}

	this.bindHandlers = function () {

		this.elements.trigger.addEventListener( 'click', function () {

			if( gallery.inProgress ) return false;
			gallery.elements.input.click();
		});

		this.elements.input.addEventListener( 'change', function () {

			if( gallery.inProgress ) return false;
			Array.prototype.forEach.call( this.files, function ( element, index ) {
				 gallery.handleNewImage( element );
			});
		});

	}

	this.handleNewImage = function ( file ) {

		if( !this.isImage( file ) ) {
			swal( 'Błąd!', 'Plik ' + file.name + ' nie jest obrazkiem!' );
			return false;
		}

		this.uploadImage( file );

	}

	this.loadExisting = function ( collection ) {

		collection.forEach( function ( image ) {
			gallery.pushImage( image.id, image.url );
		});

	}

	this.uploadingInProgress = function ( uploading ) {

		this.inProgress = uploading;

		var trigger = this.elements.trigger,
			triggerContent = trigger.querySelector('.cm-trigger-content');

		if( uploading ) {
			trigger.classList.add( 'progress' );
			triggerContent.classList.add( 'rotating' );
		} else {
			trigger.classList.remove( 'progress' );
			triggerContent.classList.remove( 'rotating' );
		}
	}

	this.uploadImage = function( file ) {

		var formData = new FormData();
		formData.append("image", file);
		formData.append("category", this.category);

		this.post( this.endpoints.upload, formData, function ( xhr ) {
			var data = JSON.parse( xhr.responseText );

			gallery.pushImage( data.id, data.url );

		}, function ( xhr ) {
			console.log( 'error'  );
			console.log( xhr.responseText  );
		});

	}

	this.pushImage = function ( id, url ) {

		var image = document.createElement('div');

		var remove = document.createElement( 'span' );

		remove.classList.add( 'cm-photo-remove' );
		remove.innerText = 'x';
		remove.addEventListener( 'click', function ( e ) {

			var element = this.parentNode;

			sconfirm( null, function () {
				gallery.removeImage( element );
			});

		});

		image.appendChild( remove );

		image.classList.add( 'cm-photo' );
		image.dataset.imageId = id;
		image.style.backgroundImage = "url('" + url + "')";

		gallery.elements.container.insertBefore( image, gallery.elements.trigger );
	}

	this.removeImage = function ( element ) {

		var id = element.dataset.imageId;
		var url = this.endpoints.remove.replace( ':id', id );

		this.get( url, function () {

			element.parentNode.removeChild( element );

		}, function () {

			swal( 'Błąd!', 'Nie udało się usunąć zdjęcia!' );

		});

	}

	this.post = function ( url, data, success, error ) {

		this.ajax( 'POST', url, data, success, error );
	}

	this.get = function ( url, success, error ) {

		this.ajax( 'GET', url, {}, success, error );
	}

	this.ajax = function ( method, url, data, success, error ) {

		var xhr = new XMLHttpRequest();

		this.uploadingInProgress( true );

		xhr.onreadystatechange = function() {

			if ( xhr.readyState == 4 ) {

				if ( xhr.status == 200 ) {
					success( xhr );
				} else {
					error( xhr );
				}
				gallery.uploadingInProgress( false );
			}

		};
		xhr.onerror = error;

		xhr.open( method, url, true );

		if( method == 'POST' || method == 'post' ) {
			xhr.send( data );
		} else {
			xhr.send();
		}

	}

	this.isImage = function ( file ) {
		return /^image\//.test( file.type )
	}

	this.bootstrap();
}
