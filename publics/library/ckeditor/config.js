/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.skin='office2013';

	config.filebrowserBrowseUrl = 'publics/library/ckfinder/ckfinder.html';

	config.filebrowserImageBrowseUrl = 'publics/library/ckfinder/ckfinder.html?type=Images';

	config.filebrowserFlashBrowseUrl = 'publics/library/ckfinder/ckfinder.html?type=Flash';

	config.filebrowserUploadUrl = 'publics/library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

	config.filebrowserImageUploadUrl = 'publics/library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

	config.filebrowserFlashUploadUrl = 'publics/library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
};
