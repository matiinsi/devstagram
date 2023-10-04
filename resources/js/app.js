import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Drop files here to upload",
    acceptedFiles: ".jpg,.png,.gif,.jpeg",
    maxFiles: 1,
    maxFilesize: 12,
    addRemoveLinks: true,
    dictRemoveFile: "Remove file",
    uploadMultiple: false,

    init: function() {
        if (document.querySelector('#imagen').value.trim()) {
            let imagenPublicada = {};
            imagenPublicada.size = 1234;
            imagenPublicada.name = document.querySelector('#imagen').value;

            this.options.addedfile.call(this, imagenPublicada); // Call the default addedfile event handler
            this.options.thumbnail.call(this, imagenPublicada, `/storage/${imagenPublicada.name}`); // Call the default thumbnail event handler

            imagenPublicada.previewElement.classList.add('dz-success');
            imagenPublicada.previewElement.classList.add('dz-complete');
        }
    }
});

dropzone.on("success", function(file, response) {
    document.querySelector('#imagen').value = response.imagen;
    console.log(response);
});

dropzone.on('error', function(file, response) {
    console.log(response);
});

dropzone.on('removedfile', function(file, response) {
    document.querySelector('#imagen').value = "";
});