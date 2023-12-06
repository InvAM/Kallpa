function handleDateSelection(event) {
	// Obtén el valor seleccionado
	var selectedDate = event.target.value;

	console.log("Fecha seleccionada:", selectedDate);
}

$(document).ready(function () {
	//VOLVER
	$("#btnAtras").on("click", function () {
		window.location.href = "menu";
	});

	//LIMPIAR
	$("#btnLimpiar").on("click", function () {
		$("#HUD").val("");
		$("#selectedDate").prop("selectedIndex", 0);
		$("#HUD").val("");
		$("#puntosI").val("");
		$("#iddomicilio").val("");
		$("#nombrecli").val("");
		$("#direcDomicilio").val("");
		$("#idnumero").val("");
		$("#mostrarDNI").val("");
		$("#dniCliente").val("");
		$("#asesorSelect").prop("selectedIndex", 0);
		$("#gabineteSelect").prop("selectedIndex", 0);
		$("#tipoInsSelect").prop("selectedIndex", 0);
	});

	//BUSCAR
	$("#formularioRC").submit(function (event) {
		event.preventDefault();
		var DNI = $("#dniCliente").val();

		//Envia el dato mediante AJAX

		$.ajax({
			url: "registrarContrato/buscarCliente",
			type: "POST",
			contentType: "application/json",
			data: JSON.stringify(DNI),
			success: function (response) {
				var cliente = JSON.parse(response);

				if (cliente.Nombre_cli == undefined) {
					$("#dniCliente").val("");
					$("input[name='nombrecli']").val("");
					$("input[name='nombrecli']").val("");
					$("input[name='direcDomicilio']").val("");
					$("input[name='iddomicilio']").val("");
					alert("Cliente no encontrado, por favor verifique el DNI");
				} else {
					// Actualiza el valor del campo de texto
					$("input[name='nombrecli']").val(cliente.DNI_cli);
					$("span#mostrarNombres").text(
						cliente.Nombre_cli + " " + cliente.Apellido_cli
					);
					$("input[name='nombrecli']").val(
						cliente.Nombre_cli + " " + cliente.Apellido_cli
					);
					$("input[name='direcDomicilio']").val(cliente.Direccion_Dom);
					$("span#mostrarDomicilio").text(cliente.Direccion_Dom);
					$("input[name='iddomicilio']").val(cliente.IDDomicilio);
					$("span#mostrarIDDom").text(cliente.IDDomicilio);
				}
			},
			error: function (error) {
				console.error(error);
			},
		});
	});

	//REGISTRAR
	$("#formularioRC1").submit(function (event) {
		event.preventDefault();
		var IDContrato = $("#HUD").val();
		var Fecha_Con = $("#selectedDate").val();
		var NumeroRadicado_Con = "R23-" + $("#HUD").val();
		var PuntoInstalacion_Con = $("#puntosI").val();
		var numSum = "1" + $("#iddomicilio").val();
		var estado = "En revision";
		var IDDomicilio = $("#iddomicilio").val();
		var DNI_cli = $("#dniCliente").val();
		var DNI_Em = $("#asesorSelect").val();
		var IDGabineteCategoria = $("#gabineteSelect").val();
		var IDTipoInst = $("#tipoInsSelect").val();
		if(IDContrato==""){
            Swal.fire({
				title: 'Seleccione',
				confirmButtonText: 'Aceptar',
				text: "Por favor verifique los campos",
				icon: 'info',
				buttonsStyling: true,
			});
		}else{
		var contratoActual = {
			IDContrato: IDContrato,
			Fecha_Con: Fecha_Con,
			NumeroRadicado_Con: NumeroRadicado_Con,
			PuntoInstalacion_Con: PuntoInstalacion_Con,
			numSum: numSum,
			estado: estado,
			IDDomicilio: IDDomicilio,
			DNI_cli: DNI_cli,
			DNI_Em: DNI_Em,
			IDGabineteCategoria: IDGabineteCategoria,
			IDTipoInst: IDTipoInst,
		};

		console.log(contratoActual);
		// Envía el formulario mediante Ajax

		$.ajax({
			url: "registrarContrato/registrarContrato",
			type: "POST",
			contentType: "application/json",
			data: JSON.stringify(contratoActual),
			success: function (response) {
				// Manejar la respuesta del servidor (si es necesario)
				Swal.fire({
					title: 'Registro exitoso',
					text: 'El contrato a sido registrado con exito ¿Desea imprimirlo?',
					icon: 'success',
					showCancelButton: true,
					confirmButtonText: 'Sí,imprimir',
					cancelButtonText: 'Aceptar',
					confirmButtonColor: '#d33',
					cancelButtonColor: '#3085d6',
					buttonsStyling: true,

				}).then((result) => {
					if (result.isConfirmed) {
						var datosParaImprimir = {
							IDContrato: contratoActual.IDContrato

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
								// Descomenta esta línea si deseas redirigir después de la solicitud AJAX
								window.location.href = "controlpdf";
							},
							error: function (xhr, textStatus, errorThrown) {
								console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
								console.log("Respuesta del servidor:", xhr.responseText);
							},
						});
					} else {
						console.log("Impresión cancelada por el usuario");
					}
				});			
				

			},
			error: function (error) {
				// Manejar errores
				console.error(error);
			},
		});
				$("#HUD").val("");
				$("#selectedDate").prop("selectedIndex", 0);
				$("#HUD").val("");
				$("#puntosI").val("");
				$("#iddomicilio").val("");
				$("#nombrecli").val("");
				$("#direcDomicilio").val("");
				$("#idnumero").val("");
				$("#dniCliente").val("");
				$("#asesorSelect").prop("selectedIndex", 0);
				$("#gabineteSelect").prop("selectedIndex", 0);
				$("#tipoInsSelect").prop("selectedIndex", 0);// Capturar información
		}
			});
});