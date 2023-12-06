// //DATOS CLIENTE
// const DNIInput = document.getElementById("dniCliente");
// const mostrarDNI = document.getElementById("mostrarDNI");

// const NombresInput = document.getElementById("nombrecli");
// const mostrarNombres = document.getElementById("mostrarNombres");

// //DATOS DEL CONTRATO
// const NumeroInput = document.getElementById("idnumero");
// const mostrarNumero = document.getElementById("mostrarNumero");

// const puntoInput = document.getElementById("puntosI");
// const mostrarPunto = document.getElementById("mostrarPunto");

// const hudInput = document.getElementById("HUD");
// const mostrarHUD = document.getElementById("mostrarHUD");

// const fechaInput = document.getElementById("selectedDate");
// const mostrarFecha = document.getElementById("mostrarFecha");

// // Datos CLIENTE
// DNIInput.addEventListener("input", () => {
// 	mostrarDNI.textContent = DNIInput.value;
// });

// NombresInput.addEventListener("input", () => {
// 	mostrarNombres.textContent = NombresInput.value;
// });

// //Datos CONTRATO
// NumeroInput.addEventListener("input", () => {
// 	mostrarNumero.textContent = NumeroInput.value;
// });

// puntoInput.addEventListener("input", () => {
// 	mostrarPunto.textContent = puntoInput.value;
// });

// hudInput.addEventListener("input", () => {
// 	mostrarHUD.textContent = hudInput.value;
// });

// fechaInput.addEventListener("input", () => {
// 	mostrarFecha.textContent = fechaInput.value;
// });

// //Datos contrato Select
// function updateContenedor() {
// 	var asesoresSelect = document.getElementById("asesorSelect");
// 	var mostrarAsesor = document.getElementById("mostrarAsesor");
// 	mostrarAsesor.textContent =
// 		asesoresSelect.options[asesoresSelect.selectedIndex].text;

// 	var tipoSelect = document.getElementById("tipoInsSelect");
// 	var mostrarTipo = document.getElementById("mostrarTipo");
// 	mostrarTipo.textContent = tipoSelect.options[tipoSelect.selectedIndex].text;

// 	var categoriaSelect = document.getElementById("gabineteSelect");
// 	var mostrarCategoria = document.getElementById("mostrarCategoria");
// 	mostrarCategoria.textContent =
// 		categoriaSelect.options[categoriaSelect.selectedIndex].text;
// }
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
