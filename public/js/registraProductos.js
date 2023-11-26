function previewImage(input) {
    var file = input.files[0];
    var reader = new FileReader();

    reader.onload = function (e) {
        document.getElementById('modal-image').src = e.target.result;
        document.getElementById('preview-link').style.display = 'block';
    };

    reader.readAsDataURL(file);
}
$(document).ready(function () {
    // Manejar el clic del botón "Seleccionar"
    $(".boton-seleccionar").on("click", function () {
        // Obtener los datos de la fila seleccionada
        var codigo = $(this).data("codigo");
        var nombre = $(this).data("nombre");
        var precio = $(this).data("precio");
        var cuota = $(this).data("cuota");
        var categoria = $(this).data("categoria");
        var marca = $(this).data("marca");

        // Rellenar el formulario con la información de la fila seleccionada
        $("#formulario").find("#product-code").val(codigo);
        $("#formulario").find("#product-name").val(nombre);
        $("#formulario").find("#product-price").val(precio);
        $("#formulario").find("#product-cuota").val(cuota);
        $("#formulario").find("#product-categoria").val(categoria);
        $("#formulario").find("#product-marca").val(marca);
    });

    // Manejar el clic del botón "Registrar"
    $("#formulario").on("submit", function (event) {
        event.preventDefault();

        // Cambiar el atributo "action" del formulario antes de enviarlo
        $(this).attr("action", "<?php echo constant('URL'); ?>registrarProducto/registrarNuevoProducto");

        // Enviar el formulario mediante AJAX
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (response) {
                // Manejar la respuesta del servidor
                console.log(response);

                // Parsear la respuesta JSON
                var responseData = JSON.parse(response);

                if (responseData.success) {
                    // Redirigir a la URL especificada en la respuesta
                    window.location.href = responseData.redirect;
                } else {
                    // Manejar el caso de registro fallido
                    console.error(responseData.mensaje);
                }
            },
            error: function (error) {
                // Manejar errores si es necesario
                console.error(error);
            },
        });
    });
});
