$(document).ready(function () {
	// Capturar el evento clic del botón del formulario
	$(".formularioLogin input[type='submit']").click(function (event) {
		// Prevenir el comportamiento predeterminado del formulario
		event.preventDefault();

		// Obtener los datos del formulario
		var formData = {
			dni: $("input[name='dni']").val(),
			nombreusuario: $("input[name='nombreusuario']").val(),
			password: $("input[name='password']").val(),
		};
		// Mostrar los datos en la consola
		console.log(formData);
		// Realizar la petición AJAX al controlador
		$.ajax({
			type: "POST",
			url: "login/loguearse",
			data: JSON.stringify(formData),
			dataType: "json", // Especifica el tipo de datos que esperas del servidor
			success: function (response) {
				console.log("Respuesta del servidor:", response);
				console.log("Dni:", response.dni);
				console.log("Nombre Usuario:", response.nombreusuario);
				if (response.success) {
					// Muestra SweetAlert de éxito
					Swal.fire({
						icon: "success",
						title: "Inicio de sesión exitoso",
						text: response.message,
					}).then(() => {
						// Redirige a otra página después de hacer clic en "OK"
						window.location.href = "menu";
					});
				} else {
					// Muestra SweetAlert de error
					Swal.fire({
						icon: "error",
						title: "Error",
						text: response.message,
					});
				}
			},
			error: function () {
				console.error("Error en la petición AJAX");
			},
		});
	});
});
