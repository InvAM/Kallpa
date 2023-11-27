$(document).ready(function () {
	$(".boton-seleccionar").on("click", function () {
		var dni = $(this).data("dni");
		var nombre = $(this).data("nombre");
		var apellido = $(this).data("apellido");
		var celular = $(this).data("celular");
		var categoria = $(this).data("categoria");

		// Rellena el formulario con la información de la fila seleccionada
		$("#formularioE").find("#DNI_Em_reg").val(dni);
		$("#formularioE").find("#Nombre_Em_reg").val(nombre);
		$("#formularioE").find("#Apellido_Em_reg").val(apellido);
		$("#formularioE").find("#Celular_Em_reg").val(celular);
		$("#formularioE").find("#IDCategoria_reg").val(categoria);
	});

	//Manejar el clic del boton "Atrás"
	$("#btnAtras").on("click",function(){
		window.location.href="menu";
	 });

	$("#btnLimpiar").on("click",function(){
		$("#DNI_Em_reg").val("");
		$("#Nombre_Em_reg").val("");
		$("#Apellido_Em_reg").val("");
		$("#Celular_Em_reg").val("");
		$("#IDCategoria_reg").val("");
		$("#DNI_Em_cre").val("");
		$("#username").val("");
		$("#password").val("");
	});

	// Manejar el clic del botón "Actualizar"
	$("#btnActualizar").on("click", function () {
		// Cambiar el atributo "action" del formulario antes de enviarlo
		$("#formularioE").attr("action", "actualizarEmpleado");
		$.ajax({
			type: "POST",
			url: $("#formularioE").attr("action"),
			data: $("#formularioE").serialize(),
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
});
