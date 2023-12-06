$(document).ready(function () {
	//Seleccionar
	$(".boton-seleccionar").on("click", function () {
		var id = $(this).data("id");
		var fecha = $(this).data("fecha");
		var sum = $(this).data("sum");
		var estado = $(this).data("estado");
		var radi = "R23-" + $(this).data("radi");

		$("#IDContrato_VC").val(id);
		$("#Fecha_VC").val(fecha);
		$("#NumerodeSuministro_VC").val(sum);
		$("#Estado_VC").val(estado);
		$("#NumerodeRadicado_VC").val(radi);
	});

	//limpiar
	$("#btnLimpiar").on("click", function () {
		$("#IDContrato_VC").val("");
		$("#Fecha_VC").val("");
		$("#NumerodeSuministro_VC").val("");
		$("#Estado_VC").val("");
		$("#NumerodeRadicado_VC").val("");
	});

	//Atras
	$("#btnAtras").on("click", function () {
		//Direccionando a otra página
		window.location.href = "menu";
		exit();
	});

	//Orden Instalación
	$("#btnOrdenI").on("click",function (event) {
		event.preventDefault();
		var IDContrato = $("#IDContrato_VC").val();

		if (IDContrato !== "") {
			$.ajax({
				url: "consultarContrato/generarOrdenI",
				type: "POST",
				contentType: "application/json",
				data: JSON.stringify(IDContrato), // Enviar un objeto con propiedad IDContrato
				success: function (response) {
					var mensaje = JSON.parse(response);
					if (mensaje == "") {
						//limpiado LocalS

						var IDContrato = $("#IDContrato_VC").val();
						var NumS = $("#NumerodeSuministro_VC").val();
						localStorage.clear();
						//Almacenando en el localS
						localStorage.setItem("IDContrato", IDContrato);
						localStorage.setItem("numSum", NumS);
						//Direccionando a otra página
						window.location.href = "generarOrdenI";
					} else {
						Swal.fire({
							title: 'Acceso denegado',
							confirmButtonText: 'Aceptar',
							text: mensaje,
							icon: 'info',
							buttonsStyling: true,
						});											
					}

					$("#IDContrato_VC").val("");
					$("#Fecha_VC").val("");
					$("#NumerodeSuministro_VC").val("");
					$("#Estado_VC").val("");
					$("#NumerodeRadicado_VC").val("");
				},
				error: function (error) {
					console.error(error);
				},
			});
		} else {
			Swal.fire({
				title: 'Seleccione',
				text: "Por favor, seleccione un contrato para generar la Orden de Instalación",
				icon: 'info',
				confirmButtonText: 'Aceptar',
				buttonsStyling: true,
			});	
		}
	});

	//Orden de Habilitación
	$("#btnOrdenH").on("click",function (event) {
		event.preventDefault();
		var IDContrato = $("#IDContrato_VC").val();

		if (IDContrato !== "") {
			$.ajax({
				url: "consultarContrato/generarOrdenH",
				type: "POST",
				contentType: "application/json",
				data: JSON.stringify(IDContrato), // Enviar un objeto con propiedad IDContrato
				success: function (response) {
					var mensaje = JSON.parse(response);
					if (mensaje == "") {
						//limpiado LocalS
						var IDContrato = $("#IDContrato_VC").val();
						var NumS = $("#NumerodeSuministro_VC").val();
						localStorage.clear();
						//Almacenando en el localS
						localStorage.setItem("IDContrato", IDContrato);
						localStorage.setItem("numSum", NumS);
						//Direccionando a otra página
						window.location.href = "generarOrdenH";
					} else {
						Swal.fire({
							title: 'Acceso denegado',
							confirmButtonText: 'Aceptar',
							text: mensaje,
							icon: 'info',
						});	
					}

					$("#IDContrato_VC").val("");
					$("#Fecha_VC").val("");
					$("#NumerodeSuministro_VC").val("");
					$("#Estado_VC").val("");
					$("#NumerodeRadicado_VC").val("");
				},
				error: function (error) {
					console.error(error);
				},
			});
		} else {
			Swal.fire({
				title: 'Seleccione',
				confirmButtonText: 'Aceptar',
				text: "Por favor, seleccione un contrato para generar la Orden de Habilitacion",
				icon: 'info',
				buttonsStyling: true,
			});
		}
	});

	$("#export").on("click", function (event) {
		event.preventDefault();
		Swal.fire({
			title: 'Exportar a Excel',
			text: 'La solicitud ha sido procesada ¿Desea exportar la lista de contratos a Excel?',
			icon: 'success',
			showCancelButton: true,
			confirmButtonText: 'Sí, exportar',
			cancelButtonText: 'Cancelar',
			confirmButtonColor: '#d33',
			cancelButtonColor: '#3085d6',
			buttonsStyling: true,
		}).then((result) => {
			if (result.isConfirmed) {
				// Utilizar AJAX para obtener el archivo
				var xhr = new XMLHttpRequest();
				xhr.open('POST', 'consultarContrato/exportarxls', true);
				xhr.responseType = 'blob';  // La respuesta esperada es un blob
				
				xhr.onload = function () {
					if (xhr.status === 200) {
						// Crear un objeto Blob con la respuesta del servidor
						var blob = new Blob([xhr.response], { type: 'application/vnd.ms-excel' });
						
						// Crear un enlace para descargar el archivo
						var link = document.createElement('a');
						link.href = window.URL.createObjectURL(blob);
						link.download = 'ReporteContrato.xls';
						
						// Hacer clic en el enlace para iniciar la descarga
						link.click();
					}
				};
	
				xhr.send();
			}
		});
	});
});
