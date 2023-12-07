$(document).ready(function () {
	//Seleccionar
	$(".btn-selec").on("click", function () {
		var id = $(this).data("id");
		var nums = $(this).data("nums");
		var dni = $(this).data("dni");
		var estado = $(this).data("estado");

		$("#IDContrato").val(id);
		$("#numSum").val(nums);
		$("#DNI_cli").val(dni);
		$("#selectedEstado option")
			.filter(function () {
				return $(this).text() === estado;
			})
			.prop("selected", true);
	});

	$(".btn-visualizar").on("click", function () {
		var id = $(this).data("id");
		var datosParaImprimir = {
			IDContrato: id,
		};
		// Enviar la información al controlador mediante Ajax
		$.ajax({
			url: "controlpdf/enviarPDF",
			type: "POST",
			contentType: "application/json",
			data: JSON.stringify(datosParaImprimir),
			dataType: "json",
			success: function (response) {
				console.log(response);
				Swal.fire({
					title: 'Visualización',
					confirmButtonText: 'Aceptar',
					text: "El archivo a sido generado de forma satisfactoia, se le direccionará a una pagina adyancente para su visualización",
					icon: 'success',
					didClose: () => {
						window.open("controlpdf", "_blank");
					}
				});	
			},
			error: function (xhr, textStatus, errorThrown) {
				console.error(
					"Error en la solicitud AJAX:",
					textStatus,
					errorThrown
				);
				console.log("Respuesta del servidor:", xhr.responseText);
			},
		});
	});
	//limpiar
	$("#limpiar").on("click", function () {
		$("#IDContrato").val("");
		$("#numSum").val("");
		$("#DNI_cli").val("");
		$("#selectedEstado").val($("#selectedEstado option:first").val());
	});

	//limpiar filtros
	$("#btn-borrar").on("click", function () {
		event.preventDefault();
		$("#filtroIDContrato").val("");
		$("#searchEstado").val("");
		$("#searchFecha").val("");
		$("#filtroIDContrato, #searchEstado, #searchFecha").trigger("input");
	});

	$("#volverMenu").on("click", function () {
		window.location.href = "menu";
		exit();
	});

	$("#filtroIDContrato").on("input", function () {
		var filtro = $(this).val().toLowerCase(); // Obtener el valor del campo de ID del contrato y convertirlo a minúsculas

		// Recorrer todas las filas de la tabla
		$("table tbody tr").each(function () {
			var idContrato = $(this).find("td:first").text().toLowerCase(); // Obtener el ID del contrato de la primera columna de la fila y convertirlo a minúsculas

			// Mostrar u ocultar la fila según el filtro
			if (idContrato.indexOf(filtro) > -1) {
				$(this).show(); // Mostrar la fila si el ID del contrato coincide con el filtro
			} else {
				$(this).hide(); // Ocultar la fila si no coincide con el filtro
			}
		});
	});

	$("#searchFecha").on("change", function () {
		var selectedDate = $(this).val();

		// Iterar a través de las filas de la tabla para mostrar/ocultar según la fecha seleccionada
		$("table tbody tr").each(function () {
			var fechaContrato = $(this).find("td:eq(1)").text(); // Cambia el índice si la posición de la fecha es diferente

			// Comparar las fechas y mostrar/ocultar la fila según la coincidencia
			if (fechaContrato.trim() === selectedDate.trim()) {
				$(this).show();
			} else {
				$(this).hide();
			}
		});
	});

	$("#searchEstado").on("input", function () {
		var selectedEstado = $(this).val().trim(); // Obtiene el valor seleccionado y elimina espacios en blanco

		$("table tbody tr").each(function () {
			var estadoContrato = $(this).find("td:nth-child(6)").text().trim(); // Obtiene el estado de cada fila y elimina espacios en blanco
			if (selectedEstado === "" || estadoContrato === selectedEstado) {
				$(this).show(); // Muestra la fila si coincide con el estado seleccionado o si no se ha seleccionado ningún estado
			} else {
				$(this).hide(); // Oculta la fila si no coincide con el estado seleccionado
			}
		});
	});

	$("#confirmar").on("click", function () {
		var IDContrato = $("#IDContrato").val();
		var Estado = $("#selectedEstado").val();

		var contratoActual = {
			IDContrato: IDContrato,
			Estado: Estado,
		};
		if (IDContrato == "") {
			Swal.fire({
				title: "Seleccione",
				confirmButtonText: "Aceptar",
				text: "Por favor seleccione un contrato",
				icon: "info",
				buttonsStyling: true,
			}).then(() => {
				location.reload();
			});
		} else {
			//Envia el formulario mediante ajax
			$.ajax({
				url: "evaluarContrato/actualizarEstado",
				type: "POST",
				contentType: "application/json",
				data: JSON.stringify(contratoActual),
				success: function (response) {
					var mensaje = JSON.parse(response);
					Swal.fire({
						title: "Actualización exitosa",
						confirmButtonText: "Aceptar",
						text: mensaje,
						icon: "success",
						buttonsStyling: true,
						didClose: () => {
							window.location.href = "evaluarContrato";
						},
					});
				},
				error: function (error) {
					// Manejar errores
					console.error(error);
				},
			});
		}
	});
});
