function createTable( tableID, settingsObject) {
    var def = { pageLength: 50, "language": { "paginate": { "first" : "Pierwsza", "last" : "Ostatnia", "previous": "Poprzednia", "next": "Następna"}, "lengthMenu": "_MENU_ rekordów na stronę", "zeroRecords": "Brak wyników", "info": "Strona _PAGE_ z _PAGES_", "infoEmpty": "Brak wyników", "infoFiltered": "(przeszukano _MAX_ wyników)","search": "Szukaj: "}}
    var settings = $.extend(def, settingsObject)
    $( tableID ).dataTable( settings );
}

var CKEDITOR_BASEPATH = CKEDITOR.basePath,
	previousVideoUrlValue = '',
	videUrlTimeoutInstace,
	youtubeUrl = 'https://www.youtube.com/watch?v=';


/**
 * CKEditor custom style list
 */
CKEDITOR.stylesSet.add( 'custom_styles',
[
    // Block-level styles
    { name : 'Blue Title', element : 'span', styles : { 'color' : 'Blue' } },
    { name : 'Red Title' , element : 'h3', styles : { 'color' : 'Red' } },
	{ name : "Tytuł firmy", element : 'h3', attributes: { 'class' :  'company-name' }},
	{ name : "Imie", element : 'h3', attributes: { 'class' :  'name' }},
	{ name : "Stanowisko", element : 'h3', attributes: { 'class' :  'position' }},
	{ name : "Telefon", element : 'h3', attributes: { 'class' :  'phone' }},

    // Inline styles
    { name : 'CSS Style', element : 'span', attributes : { 'class' : 'my_style' } },
    { name : 'Marker: Yellow', element : 'span', styles : { 'background-color' : 'Yellow' } }
]);

/**
 * Youtube video url parser
 * @param  {jQuery} el    input dom object
 * @param  {Event}  event chage event
 * @return {void}
 */
function parseVideoUrl ( el, event ) {
	if( !( el instanceof jQuery ) ) el = $( el );

	// nothing has changed than quit
	if( el.val() == previousVideoUrlValue ) return false;

	// found valid youtube id than quit
	if( el.val().match( /^[A-Za-z0-9_-]{9,11}$/ ) ) return false;

	// save current input value
	previousVideoUrlValue = el.val();

	var regex = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/,
		match = el.val().match( regex );

	if( match && match[7].length > 8 && match[7].length < 12 ) {
		return el.val( match[7] );
	} else {
		swal( 'Błąd!', 'Podano niepoprawny adres video!' );
	}

}

$( document ).ready( function () {

	/**
	 * Detect config and build wysiwyg
	 */
	$('[data-wysiwyg]').each( function () {

		var config = $( this ).data( 'wysiwyg' );

		if( typeof config == "undefined" ) config == 'standard';

		CKEDITOR.config.customConfig = '/adminlte/plugins/ckeditor/' + config + '.js';
		CKEDITOR.replace(this);

	});


});
