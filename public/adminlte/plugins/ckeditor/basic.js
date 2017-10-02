CKEDITOR.editorConfig = function( config ) {

	config.defaultLanguage = 'pl';
	// config.language = 'en';

	config.skin = 'moono'

	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.stylesSet = 'custom_styles';

	config.format_tags = 'h1;h2;h3;h4;h5;p';

	config.removeButtons = 'Source,Save,Templates,NewPage,Preview,Print,Cut,Find,Replace,SelectAll,Scayt,Form,HiddenField,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,Strike,Subscript,Superscript,NumberedList,CreateDiv,Blockquote,BidiLtr,BidiRtl,Language,Flash,Table,Image,Smiley,SpecialChar,PageBreak,Iframe,Font,TextColor,Maximize,About,ShowBlocks,Anchor,HorizontalRule,BGColor,Outdent,Indent,Copy,Paste,PasteFromWord,PasteText,Undo,Redo';

	config.removePlugins = 'elementspath';
};
