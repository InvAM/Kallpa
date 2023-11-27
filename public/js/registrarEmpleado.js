$(document).ready(function () {
	$(".boton-seleccionar").on("click", function () {
		var dni = $(this).data("dni");
		var nombre = $(this).data("nombre");
		var apellido = $(this).data("apellido");
		var celular = $(this).data("celular");
		var categoria = $(this).data("categoria");

		$("#formularioE").find("#DNI_Em").val(dni);
		$("#formularioE").find("#Nombre_Em").val(nombre);
		$("#formularioE").find("#Apellido_Em").val(apellido);
		$("#formularioE").find("#Celular_Em").val(celular);
		$("#formularioE").find("#IDCategoria").val(categoria);
	});

	$("#btnRegistrar").on("click", function (event) {
		event.preventDefault();
		var formData = {
			DNI_Em: $("input[name='DNI_Em']").val(),
			Nombre_Em: $("input[name='Nombre_Em']").val(),
			Apellido_Em: $("input[name='Apellido_Em']").val(),
			Celular_Em: $("input[name='Celular_Em']").val(),
			IDCategoria: $("select[name='IDCategoria']").val(),
		};
		console.log(formData);
		$.ajax({
			type: "POST",
			url: "registrarEmpleado/registrarNuevoEmpleado",
			data: JSON.stringify(formData),
			contentType: "application/json",
			dataType: "json",
			success: function (response) {
				console.log("Respuesta del servidor", response);

				if (response.success) {
					Swal.fire({
						icon: "success",
						title: "Empleado registrado correctamente",
						text: response.message,
					}).then(() => {
						location.reload();
					});
				} else {
					Swal.fire({
						icon: "error",
						title: "No se puede registrar al empleado",
						text: response.message,
					});
				}
			},
			error: function (error) {
				console.error("Error en la petición AJAX", error);
			},
		});
	});
	$("#btnEliminar").on("click", function () {
		var formData = {
			dni: $(this).closest("tr").find(".dniColumn").text().trim(),
		};

		Swal.fire({
			title: "¿Estás seguro?",
			text: "¡No podrás revertir esto!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#d33",
			cancelButtonColor: "#3085d6",
			confirmButtonText: "Sí, eliminarlo",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: "registrarEmpleado/eliminarEmpleado",
					data: JSON.stringify(formData),
					contentType: "application/json",
					dataType: "json",
					success: function (response) {
						if (response.success) {
							Swal.fire({
								icon: "success",
								title: "Empleado eliminado correctamente",
								text: response.message,
							}).then(() => {
								location.reload();
							});
						} else {
							Swal.fire({
								icon: "error",
								title: "No se puede eliminar al empleado",
								text: response.message,
							});
						}
					},
					error: function (error) {
						console.error("Error en la petición AJAX", error);
						console.log("Respuesta del servidor:", error.responseText);
					},
				});
			}
		});
	});

	$("#btnActualizar").on("click", function () {
		var formData = {
			DNI_Em: $("input[name='DNI_Em']").val(),
			Nombre_Em: $("input[name='Nombre_Em']").val(),
			Apellido_Em: $("input[name='Apellido_Em']").val(),
			Celular_Em: $("input[name='Celular_Em']").val(),
			IDCategoria: $("select[name='IDCategoria']").val(),
		};
		console.log(formData);
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
					url: "registrarEmpleado/actualizarEmpleado",
					data: JSON.stringify(formData),
					contentType: "application/json",
					dataType: "json",
					success: function (response) {
						if (response.success) {
							Swal.fire({
								icon: "success",
								title: "Empleado actualizado correctamente",
								text: response.message,
							}).then(() => {
								location.reload();
							});
						} else {
							Swal.fire({
								icon: "error",
								title: "No se puede actualizar al empleado",
								text: response.message,
							});
						}
					},
					error: function (error) {
						console.error("Error en la petición AJAX", error);
						console.log("Respuesta del servidor:", error.responseText);
					},
				});
			}
		});
	});

	$("#btnRegistrarCredenciales").on("click", function (event) {
		event.preventDefault();
		var formData = {
			DNI_Em: $("input[name='DNI_Em_c']").val(),
			nombreusuario: $("input[name='nombreusuario']").val(),
			password: $("input[name='password']").val(),
		};
		console.log(formData);
		Swal.fire({
			title: "Estás por agregar credenciale",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#33cc33",
			cancelButtonColor: "red",
			confirmButtonText: "Sí, agregar",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: "registrarEmpleado/registrarCredenciales",
					data: JSON.stringify(formData),
					contentType: "application/json",
					dataType: "json",
					success: function (response) {
						if (response.success) {
							Swal.fire({
								icon: "success",
								title: "Credenciales del empleado agregadas correctamente",
								text: response.message,
							}).then(() => {
								location.reload();
							});
						} else {
							Swal.fire({
								icon: "error",
								title: "No se puedieron agregar las credenciales al empleado",
								text: response.message,
							});
						}
					},
					error: function (error) {
						console.error("Error en la petición AJAX", error);
						console.log("Respuesta del servidor:", error.responseText);
					},
				});
			}
		});
	});
});
