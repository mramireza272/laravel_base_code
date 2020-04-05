/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */


CKEDITOR.editorConfig = function( config ) {
	//config.font_names = 'Gotham/Gotham Book' + config.font_names;
	//config.contentsCss =  ['/CKEditor/CustomFonts/font.css', 'https://fonts.googleapis.com/css?family=Trade+Winds&display=swap'];
	//config.contentsCss =  '/css/fonts.css';
	//config.font_names = 'Source Sans Pro Regular/SourceSansPro-Regular;' + config.font_names;
	config.contentsCss = '/css/fonts.css';
	config.font_names = 'Gotham Bold/Gotham Bold;' + config.font_names;
	config.font_names = 'Gotham Book/Gotham Book;' + config.font_names;
	config.font_names = 'Source Regular/Source Regular;' + config.font_names;
	config.font_names = 'Source Semibold/Source Semibold;' + config.font_names;
	config.disallowedContent = 'br';
	config.disallowedContent = 'p';
	config.defaultLanguage    = 'es_ES';
	config.language           = 'es_ES';
	config.scayt_sLang        = 'es_ES';
	config.wsc_lang           = "es_ES";
	config.extraPlugins       = 'wsc';
	config.scayt_autoStartup  = true;
	config.skin               = 'office2013';
	config.extraPlugins       = 'justify';
	config.language           = 'es_ES';
	//config.uiColor = '#F9F9F9';
	config.height             = 300;
	config.toolbarCanCollapse = true;

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

	config.removeButtons = 'CreateDiv,Styles,Source,Print,Save,NewPage,Preview,Templates,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Flash,Iframe,PageBreak,Maximize,ShowBlocks,About';
};

// CKEDITOR.config.font_names =
// 'Arial/Arial, Helvetica, sans-serif;' +
// 'Comic Sans MS/Comic Sans MS, cursive;' +
// 'Courier New/Courier New, Courier, monospace;' +
// 'Georgia/Georgia, serif;' +
// 'Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;' +
// 'Tahoma/Tahoma, Geneva, sans-serif;' +
// 'Times New Roman/Times New Roman, Times, serif;' +
// 'Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;' +
// 'Verdana/Verdana, Geneva, sans-serif' +
// 'Gotham/Gotham Book';
