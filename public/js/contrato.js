$("#dniCliente").on("input", function () {
	$("#mostrarDNI").text($(this).val());
});

// DATOS DEL CONTRATO
$("#idnumero").on("input", function () {
	$("#mostrarNumero").text($(this).val());
});

$("#puntosI").on("input", function () {
	$("#mostrarPunto").text($(this).val());
});

$("#HUD").on("input", function () {
	$("#mostrarHUD").text($(this).val());
});

$("#selectedDate").on("input", function () {
	$("#mostrarFecha").text($(this).val());
});

// Datos contrato Select
function updateContenedor() {
	var asesoresSelect = $("#asesorSelect");
	$("#mostrarAsesor").text(asesoresSelect.find("option:selected").text());

	var tipoSelect = $("#tipoInsSelect");
	$("#mostrarTipo").text(tipoSelect.find("option:selected").text());

	var categoriaSelect = $("#gabineteSelect");
	$("#mostrarCategoria").text(categoriaSelect.find("option:selected").text());
}