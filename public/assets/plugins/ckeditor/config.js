/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
    // config.uiColor = '#AADC6E';
    // config.entities = false;

    var csrf_token = $('meta[name=csrf-token]').attr('content');

    console.log(csrf_token);

    config.allowedContent = false;
    config.extraAllowedContent = 'i(*){*}[*]';

    config.filebrowserUploadUrl = base_url + '/admin/upload-image?_token=' + csrf_token;

    // Add plugin
    config.extraPlugins = 'filebrowser';

};
