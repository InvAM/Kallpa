function iniciar() {
	if (localStorage.getItem("DNI_Em_T") || localStorage.getItem("numSum")) {
		// Obtener los datos del localStorage de TECNICO
		var dni = localStorage.getItem("DNI_Em_T");
		var nombre = localStorage.getItem("Nombre_Em_T");
		var apellido = localStorage.getItem("Apellido_Em_T");
		if (localStorage.getItem("Nombre_Em_T")) {
			var nombreCompleto = nombre + " " + apellido;
		} else {
			var nombreCompleto = "";
		}

		//Obtener los datos del localStorage de CONTRATO
		var numS = localStorage.getItem("numSum");
		var idContrato = localStorage.getItem("IDContrato");

		// Asignar los valores a los campos del formulario
		var numO = "OI-" + idContrato;

		console.log(numO);
		$("input[name='numOrden_G']").val(numO);
		$("input[name='IDContrato_G']").val(idContrato);
		$("input[name='NumS_G']").val(numS);
		$("input[name='DNI_Em_T']").val(dni);
		$("input[name='NombreCompleto_Em']").val(nombreCompleto);
	}
}

function handleDateSelection(event) {
	// Obtén el valor seleccionado
	var selectedDate = event.target.value;

	console.log("Fecha seleccionada:", selectedDate);
}

document.addEventListener("DOMContentLoaded", iniciar);

$(document).ready(function () {
	$("#formularioGOI").submit(function (event) {});
});

$(document).ready(function () {
	//AgregarTécnico
	$("#btnAgregarTecnico").on("click", function () {
		//Direccionando a otra página
		window.location.href = "tecnico";
		exit();
	});
	//Volver
	$("#btnVolver").on("click", function () {
		//Direccionando a otra página
		window.location.href = "consultarContrato";
		exit();
	});
	//limpiar
	$("#btnLimpiar").on("click", function () {
		$("input[name='DNI_Em_T']").val("");
		$("input[name='NombreCompleto_Em']").val("");
	});
});
