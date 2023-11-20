$(document).ready(function (){
    $(".boton-seleccionar").on("click", function(){
        var dni = $(this).data("dni");
        var nombre = $(this).data("nombre");
        var apellido =$(this).data("apellido");
        var fecha = $(this).data("fecha");
        var genero = $(this).data("genero");
        var nacionalidad = $(this).data("nacionalidad");
        var estado = $(this).data("estado");
        var celular =$(this).data("celular");

        $("#formularioC").find("#DNI_cli_reg").val(dni);
        $("#formularioC").find("#Nombre_cli_reg").val(nombre);
        $("#formularioC").find("#Apellido_cli_reg").val(apellido);
        $("#formularioC").find("#Celular_cli_reg").val(celular);
        $("#formularioC").find("#FechaNacimiento:_cli_reg").val(fecha);
        $("#formularioC").find("#IDGenero_reg").val(genero);
        $("#formularioC").find("#IDNacionalidad_regNI_cli_reg").val(nacionalidad);
        $("#formularioC").find("#IDEstadoCivil_reg").val(estado);
    });

    // Manejar el clic del botón "Actualizar"
	$("#btnActualizar").on("click", function () {
		// Cambiar el atributo "action" del formulario antes de enviarlo
		$("#formularioC").attr("action", "registrarCliente/actualizarCliente");
		$.ajax({
			type: "POST",
			url: $("#formularioC").attr("action"),
			data: $("#formularioC").serialize(),
			success: function (response) {
				// Manejar la respuesta del servidor
				console.log(response);

				// Parsear la respuesta JSON
				var responseData = JSON.parse(response);

				if (responseData.success) {
					// Redirigir a la URL especificada en la respuesta
					window.location.href = responseData.redirect;
				} else {
					// Manejar el caso de actualización fallida
					console.error(responseData.mensaje);
				}
			},
			error: function (error) {
				// Manejar errores si es necesario
				console.error(error);
			},
		});
	});
})