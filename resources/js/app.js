import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Agrega una imágen del producto aquí",
    acceptedFiles: ".png,.jpg,.jpeg,.gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,

    // Mantener la imagen cuando se falla la validacion en el formulario
    init: function () {
        if (document.querySelector("#imageProduct").value.trim()) {
            const imagen = {};
            imagen.size = 1234;
            imagen.name = document.querySelector("#imageProduct").value;

            this.options.addedfile.call(this, imagen);
            this.options.thumbnail.call(
                this,
                imagen,
                `/uploads/products/${imagen.name}`
            );
            imagen.previewElement.classList.add("dz-success", "dz-completed");
        }
    },
});

// Asignar el value al formulario para almacenarlo en la base de datos
dropzone.on("success", function (file, response) {
    console.log(response.imagen);
    const inputImage = (document.querySelector("#imageProduct").value =
        response.imagen);
});

// Remover el value de la imagen cuando se elimine de dropzone
dropzone.on("removedfile", function () {
    const inputImage = (document.querySelector("#imageProduct").value = "");
});
