$(document).ready(function () {
    "use strict"; // Start of use strict
    Dropzone.options.dropzoneForm = {
        url: base_url + "/admin/attribute/step3/upload",
        autoProcessQueue: true,
        uploadMultiple: false,
        paramName: "file", // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        acceptedFiles: "image/*",
        params: {'_token': $('meta[name="csrf-token"]').attr('content')},
        dictDefaultMessage: "<i class='pe-7s-cloud-upload upload-icon'></i><strong>Drop files here or click to upload. </strong>",
        error: function(file, message) { 
            alert("Upload failed"); 
        },
        success: function(file, message) {
            imageUrl = message;
        }
    };

});