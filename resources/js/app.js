import Chart from "chart.js/auto";
import Dropzone from "dropzone";

fetch("api/products")
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
        // Extraer los datos de la respuesta
        const labels = Object.keys(data);
        const values = Object.values(data);

        // Definir los colores para cada label
        const backgroundColors = [
            "#FF6384",
            "#36A2EB",
            "#FFCE56",
            "#0e813c",
            "#9966FF",
            "#C9CBCF",
            "#6f4f28",
        ];

        // Crear la gráfica de barras
        const ctx = document.getElementById("pieChart").getContext("2d");
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: labels,
                datasets: [
                    {
                        label: "Cantidad",
                        data: values,
                        backgroundColor: backgroundColors.slice(
                            0,
                            labels.length
                        ), // Asegúrate de que haya suficientes colores
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        ticks: {
                            callback: function (value) {
                                return Number.isInteger(value) ? value : ""; // Muestra solo enteros
                            },
                        },
                    },
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            generateLabels: function (chart) {
                                const labels = chart.data.labels;
                                return labels.map((label, index) => ({
                                    text: label,
                                    fillStyle: backgroundColors[index],
                                    strokeStyle: backgroundColors[index],
                                    lineWidth: 2,
                                    hidden: false,
                                    index: index,
                                }));
                            },
                        },
                    },
                },
            },
        });
    })
    .catch((error) => console.error(error));

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
