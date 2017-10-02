CKEDITOR.editorConfig = function( config ) {

	config.defaultLanguage = 'pl';
	// config.language = 'en';

	config.skin = 'moono'

	config.toolbarGroups = [
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] }
	];

	config.removeButtons = 'Source,Save,NewPage,Preview,Print,Templates,Replace,SelectAll,Scayt,Form,Radio,Textarea,Select,TextField,Button,ImageButton,HiddenField,Checkbox,CreateDiv,Blockquote,BidiRtl,BidiLtr,Language,Flash,Smiley,PageBreak,Iframe,Font,ShowBlocks,About';

	config.stylesSet = 'custom_styles';

	config.format_tags = 'h1;h2;h3;h4;h5;p';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
};
