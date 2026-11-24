$(document).ready(function () {
    "use strict"; // Start of use strict
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    if ($('#editor1').length > 0) {

        CKEDITOR.replace('editor1', {
            allowedContent: true,
            extraAllowedContent: 'i(*){*}[*]',
            extraPlugins: 'filebrowser'
        });
    }

    if ($('#editor2').length > 0) {

        CKEDITOR.replace('editor2', {
            allowedContent: true,
            extraAllowedContent: 'i(*){*}[*]',
            extraPlugins: 'filebrowser'
        });
    }

    if ($('#editor3').length > 0) {

        CKEDITOR.replace('editor3', {
            allowedContent: true,
            extraAllowedContent: 'i(*){*}[*]',
            extraPlugins: 'filebrowser'
        });
    }

    if ($('#editor4').length > 0) {

        CKEDITOR.replace('editor4', {
            allowedContent: true,
            extraAllowedContent: 'i(*){*}[*]',
            extraPlugins: 'filebrowser'
        });
    }

    if ($('#editor5').length > 0) {

        CKEDITOR.replace('editor5', {
            allowedContent: true,
            extraAllowedContent: 'i(*){*}[*]',
            extraPlugins: 'filebrowser'
        });
    }
});