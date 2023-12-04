$(document).ready(function () {
    $("#btnRegistrarMaterial").on("click", function (event) {
        event.preventDefault();

        var formData = {
            idmateriales: $("input[name='idmateriales']").val(),
            nombre_materiales: $("input[name='nombre_materiales']").val(),
            UnidadMedida_Ma: $("input[name='Unidad_Ma']").val(),
            stock_materiales: $("input[name='stock_materiales']").val(),
        };

        console.log("Datos del formulario:", formData);

        $.ajax({
            type: "POST",
            url: "registrarmate/registrar",
            data: JSON.stringify(formData),
            contentType: "application/json",
            dataType: "json",
            success: function (response) {
                console.log("Success response:", response);

                if (response && response.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Material registrado correctamente",
                        text: response.message,
                    }).then(() => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "No se puede registrar el Material",
                        text: response ? response.message : "Error desconocido",
                    });
                }
            },
            error: function (error) {
                console.error("Error en la petición AJAX", error);
            },
        });
    });
$(".seleccionar-btn").on("click", function () {
    // Extracting data attributes from the button
    var idMaterial = $(this).data("idmateriales");
    var nombreMaterial = $(this).data("nombre_materiales");
    var unidadMedida = $(this).data("unidad_ma");
    var stockMaterial = $(this).data("stock_materiales");

    // Updating the form fields with the extracted data
    $("#idmateriales").val(idMaterial);
    $("#nombre_materiales").val(nombreMaterial);
    $("#Unidad_Ma").val(unidadMedida);
    $("#stock_materiales").val(stockMaterial);
});
$("#btnActualizarMaterial").on("click", function () {
    var formData = {
        IDMaterial: $("input[name='idmateriales']").val(),
        Nombre_Ma: $("input[name='nombre_materiales']").val(),
        UnidadMedida_Ma: $("input[name='Unidad_Ma']").val(),
        Stock_Ma: $("input[name='stock_materiales']").val(),
    };

    Swal.fire({
        title: "Estás por actualizar",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#33cc33",
        cancelButtonColor: "red",
        confirmButtonText: "Sí, actualizar",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "registrarmate/actualizarMaterial",
                data: JSON.stringify(formData),
                contentType: "application/json",
                dataType: "json",
                success: function (response) {
                    console.log(response.success);
                    if (response.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Material actualizado correctamente",
                            text: response.message,
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "No se puede actualizar el material",
                            text: response.message,
                        });
                    }
                },
                error: function (error) {
                    console.error("Error in the AJAX request", error);
                    console.log("Server response:", error.responseText);
                },
            });
        }
    });
});
});
$(document).on("click", ".btnEliminar", function()  {
    var formData = {
        idmateriales: $(this).closest("tr").find(".idmaterialColumn").text().trim(),
    };

    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡No podrás revertir esto!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sí, eliminar",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "registrarmate/eliminarmaterial",
                data: JSON.stringify(formData),
                contentType: "application/json",
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: "success",
                            title: "Material eliminado correctamente",
                            text: response.message,
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "No se puede eliminar el material",
                            text: response.message,
                        });
                    }
                },
                error: function (error) {
                    console.error("Error en la petición AJAX", error);
                },
            });
        }
    });
});

