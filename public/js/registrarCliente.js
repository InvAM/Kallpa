function handleDateSelection(event) {
	// Obtén el valor seleccionado
	var selectedDate = event.target.value;

	console.log("Fecha seleccionada:", selectedDate);
}


$(document).ready(function(){
	//VOLVER
	$("#btnAtras").on("click", function(){
		window.location.href="menu";
	});

	//LIMPIAR
	$("#btnLimpiar").on("click", function(){
	$("#IDDomicilio_reg").val("");
	$("#Direccion_Dom_reg").val("");
	$("#Interior_Dom_reg").val("");
	$("#Piso_Dom_reg").val("");
	$("#Nomb_Malla_Dom_reg").val("");
	$("#IDCondicion").prop("selectedIndex", 0);
	$("#IDEstrato_reg").prop("selectedIndex", 0);
	$("#IDPredio_reg").prop("selectedIndex", 0);
	$("#IDDistrito_reg").prop("selectedIndex", 0);
	$("#Nombre_cli_reg").val("");
	$("#Apellido_cli_reg").val("");
	$("#DNI_cli_reg").val("");
	$("#FechaNacimiento").val("");
	$("#IDGenero_reg").prop("selectedIndex",0);
	$("#Celular_cli_reg").val("");
	$("#IDNacionalidad_reg").prop("selectedIndex",0);
	$("#IDEstadoCivil_reg").prop("SelectedIndex",0);
	});

	//REGISTRAR
	$("#formularioRCL1").submit(function(event){
		event.preventDefault();
		var IDDomicilio = $("#IDDomicilio_reg").val();
		var Direccion_Dom = $("#Direccion_Dom_reg").val();
		var Interior_Dom = $("#Interior_Dom_reg").val();
		var Piso_Dom = $("#Piso_Dom_reg").val();
		var Nomb_Malla_Dom = $("#Nomb_Malla_Dom_reg").val();
		var IDCondicion = $("#IDCondicion").val();
		var IDEstrato = $("#IDEstrato_reg").val();
		var IDPredio = $("#IDPredio_reg").val();
		var IDDistrito = $("#IDDistrito_reg").val();
		var Nombre_cli = $("#Nombre_cli_reg").val();
		var Apellido_cli = $("#Apellido_cli_reg").val();
		var DNI_cli = $("#DNI_cli_reg").val();
		var FechaNacimiento_cli = $("#FechaNacimiento").val();
		var IDGenero = $("#IDGenero_reg").val();
		var Celular_cli = $("#Celular_cli_reg").val();
		var IDNacionalidad =$("#IDNacionalidad_reg").val();
		var IDEstadoCivil = $("#IDEstadoCivil_reg").val();

		var registroActual = {
			IDDomicilio: IDDomicilio,
			Direccion_Dom: Direccion_Dom,
			Interior_Dom: Interior_Dom,
			Piso_Dom: Piso_Dom,
			Nomb_Malla_Dom: Nomb_Malla_Dom,
			IDCondicion: IDCondicion,
			IDEstrato: IDEstrato,
			IDPredio: IDPredio,
			IDDistrito: IDDistrito,
			Nombre_cli: Nombre_cli,
			Apellido_cli: Apellido_cli,
			DNI_cli: DNI_cli,
			FechaNacimiento_cli: FechaNacimiento_cli,
			IDGenero: IDGenero,
			Celular_cli: Celular_cli,
			IDNacionalidad: IDNacionalidad,
			IDEstadoCivil: IDEstadoCivil
		};

		console.log(registroActual);
		//Envia el formulario mediante Ajax

		$.ajax({
			url: "registrarCliente/registrarCliente",
			type: "POST",
			contentType: "application/json",
			data: JSON.stringify(registroActual),
			success: function(response){
				alert(response);
				$("#IDDomicilio_reg").val("");
				$("#Direccion_Dom_reg").val("");
				$("#Interior_Dom_reg").val("");
				$("#Piso_Dom_reg").val("");
				$("#Nomb_Malla_Dom_reg").val("");
				$("#IDCondicion").prop("selectedIndex", 0);
				$("#IDEstrato_reg").prop("selectedIndex", 0);
				$("#IDPredio_reg").prop("selectedIndex", 0);
				$("#IDDistrito_reg").prop("selectedIndex", 0);
				$("#Nombre_cli_reg").val("");
				$("#Apellido_cli_reg").val("");
				$("#DNI_cli_reg").val("");
				$("#FechaNacimiento").val("");
				$("#IDGenero_reg").prop("selectedIndex",0);
				$("#Celular_cli_reg").val("");
				$("#IDNacionalidad_reg").prop("selectedIndex",0);
				$("#IDEstadoCivil_reg").prop("SelectedIndex",0);
			},
			error: function(error){
				console.error(error);
			},
		});
	});

});