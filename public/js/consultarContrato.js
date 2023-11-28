$(document).ready(function () {
	//Seleccionar
	$(".boton-seleccionar").on("click", function () {
		var id = $(this).data("id");
		var fecha = $(this).data("fecha");
		var sum = $(this).data("sum");
		var estado = $(this).data("estado");
		var radi = "R23-" + $(this).data("radi");

		$("#formularioVC").find("#IDContrato_VC").val(id);
		$("#formularioVC").find("#Fecha_VC").val(fecha);
		$("#formularioVC").find("#NumerodeSuministro_VC").val(sum);
		$("#formularioVC").find("#Estado_VC").val(estado);
		$("#formularioVC").find("#NumerodeRadicado_VC").val(radi);
	});

	//limpiar
	$("#btnLimpiar").on("click", function () {
		$("#formularioVC").find("#IDContrato_VC").val("");
		$("#formularioVC").find("#Fecha_VC").val("");
		$("#formularioVC").find("#NumerodeSuministro_VC").val("");
		$("#formularioVC").find("#Estado_VC").val("");
		$("#formularioVC").find("#NumerodeRadicado_VC").val("");
	});

	//Atras
	$("#btnAtras").on("click", function () {
		//Direccionando a otra página
		window.location.href = "menu";
		exit();
	});

	//Orden Instalación
	$("#formularioCC").submit(function (event) {
		event.preventDefault();
		var IDContrato = $("#IDContrato_VC").val();

		if (IDContrato !== "") {
			console.log("Me presione");
			$.ajax({
				url: "consultarContrato/generarOrdenI",
				type: "POST",
				contentType: "application/json",
				data: JSON.stringify(IDContrato), // Enviar un objeto con propiedad IDContrato
				success: function (response) {
					var mensaje = JSON.parse(response);
					if (mensaje == "") {
						//limpiado LocalS

						var IDContrato = $("#formularioVC").find("#IDContrato_VC").val();
						var NumS = $("#formularioVC").find("#NumerodeSuministro_VC").val();
						localStorage.clear();
						//Almacenando en el localS
						localStorage.setItem("IDContrato", IDContrato);
						localStorage.setItem("numSum", NumS);
						//Direccionando a otra página
						window.location.href = "generarOrdenI";
					} else {
						alert(mensaje);
					}

					$("#formularioVC").find("#IDContrato_VC").val("");
					$("#formularioVC").find("#Fecha_VC").val("");
					$("#formularioVC").find("#NumerodeSuministro_VC").val("");
					$("#formularioVC").find("#Estado_VC").val("");
					$("#formularioVC").find("#NumerodeRadicado_VC").val("");
				},
				error: function (error) {
					console.error(error);
				},
			});
		} else {
			alert(
				"Por favor, seleccione un contrato para generar la Orden de Instalación"
			);
		}
	});

	//Orden de Habilitación
	$("#formularioCC1").submit(function (event) {
		event.preventDefault();
		var IDContrato = $("#IDContrato_VC").val();

		if (IDContrato !== "") {
			console.log("Me presione");
			$.ajax({
				url: "consultarContrato/generarOrdenH",
				type: "POST",
				contentType: "application/json",
				data: JSON.stringify(IDContrato), // Enviar un objeto con propiedad IDContrato
				success: function (response) {
					var mensaje = JSON.parse(response);
					if (mensaje == "") {
						//limpiado LocalS

						var IDContrato = $("#formularioVC").find("#IDContrato_VC").val();
						var NumS = $("#formularioVC").find("#NumerodeSuministro_VC").val();
						localStorage.clear();
						//Almacenando en el localS
						localStorage.setItem("IDContrato", IDContrato);
						localStorage.setItem("numSum", NumS);
						//Direccionando a otra página
						window.location.href = "generarOrdenH";
					} else {
						alert(mensaje);
					}

					$("#formularioVC").find("#IDContrato_VC").val("");
					$("#formularioVC").find("#Fecha_VC").val("");
					$("#formularioVC").find("#NumerodeSuministro_VC").val("");
					$("#formularioVC").find("#Estado_VC").val("");
					$("#formularioVC").find("#NumerodeRadicado_VC").val("");
				},
				error: function (error) {
					console.error(error);
				},
			});
		} else {
			alert(
				"Por favor, seleccione un contrato para generar la Orden de Habilitacion"
			);
		}
	});
});
