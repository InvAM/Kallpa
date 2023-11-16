$(document).ready(function () {
	// Capturar el evento clic del botón del formulario
	$(".formularioLogin input[type='submit']").click(function (event) {
		// Prevenir el comportamiento predeterminado del formulario
		event.preventDefault();

		// Obtener los datos del formulario
		var formData = $(".formularioLogin").serialize();

		// Mostrar los datos en la consola

		// Realizar la petición AJAX al controlador
		$.ajax({
			type: "POST",
			url: "login/loguearse",
			data: formData,
			success: function (response) {
				// Manejar la respuesta del servidor, por ejemplo, mostrar SweetAlert
				if (response === "OK") {
					Swal.fire({
						icon: "success",
						title: "Éxito",
						text: "Credenciales correctas",
						didClose: function () {
							// Redireccionar a la página de menú después de cerrar SweetAlert
							window.location.href = "menu";
						},
					});
				} else {
					Swal.fire({
						icon: "error",
						title: "Error",
						text: "Credenciales incorrectas",
					});
				}
			},
			error: function () {
				// Manejar errores de la petición AJAX
				Swal.fire({
					icon: "error",
					title: "Error",
					text: "Hubo un problema al realizar la operación.",
				});
			},
		});
	});
});
