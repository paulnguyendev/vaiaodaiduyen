/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
//	CKEDITOR.scriptLoader.load( CKEDITOR.basePath + 'plugins/image_uploader/plugin.js' );
//	config.enterMode = CKEDITOR.ENTER_BR;
 config.filebrowserBrowseUrl = '/kcfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = '/kcfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = '/kcfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = '/kcfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = '/kcfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = '/kcfinder/upload.php?type=flash';
	config.htmlEncodeOutput = false;
	config.entities = false;
	config.autoParagraph = true;
};
