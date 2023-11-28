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
    $("#formularioRegistrarProducto").submit(function (event) {
        event.preventDefault(); 
        var codigo = $("#product-code").val();
        var nombre = $("#product-name").val();
        var precio = $("#product-price").val();
        var cuota = $("#product-cuota").val();
        var categoria = $("#id-categoria").val();
        var marca = $("#id-marca").val();
        var imagen = document.getElementById('file-upload').files[0];

        var formData = new FormData();
        formData.append('codigo', codigo);
        formData.append('nombre', nombre);
        formData.append('precio', precio);
        formData.append('cuota', cuota);
        formData.append('id-categoria', categoria);
        formData.append('id-marca', marca);
        formData.append('imagen', imagen);

        // Realiza la solicitud AJAX
        $.ajax({
            url: "<?php echo constant('URL'); ?>registrarProducto/registrarNuevoProducto",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Manejar la respuesta del servidor (si es necesario)
                alert(response);
                // Limpiar los campos del formulario
                $("#product-code").val("");
                $("#product-name").val("");
                $("#product-price").val("");
                $("#product-cuota").val("");
                $("#id-categoria").val("");
                $("#id-marca").val("");
                $("#file-upload").val("");
                // Actualizar la tabla de productos si es necesario
                // ...

                // También puedes realizar otras acciones después de registrar el producto
            },
            error: function (error) {
                // Manejar errores
                console.error(error);
            },
        });
    });
});
