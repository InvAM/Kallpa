function iniciar() {
	if (localStorage.getItem("IDContrato")) {
		//Obtener los datos del localStorage de ORDEN
		var idcontrato = localStorage.getItem("IDContrato");
		var idetapa = localStorage.getItem("IDEtapa");
		var fecha = localStorage.getItem("Fecha");

		console.log("Fecha" + fecha);
		$("input[name='IDContrato_M']").val(idcontrato);
		$("input[name='IDEtapa_M']").val(idetapa);
		$("input[name='Fecha_O']").val(fecha);
	}
}

document.addEventListener("DOMContentLoaded", iniciar);

function actualizarTabla($lista) {
	var listaMateriales = $lista;

	let tbodyTabla = document
		.getElementById("tablaMateriales")
		.getElementsByTagName("tbody")[0];

	tbodyTabla.innerHTML = "";

	listaMateriales.forEach((material) => {
		let fila = tbodyTabla.insertRow();

		let celdaID = fila.insertCell(0);
		celdaID.innerHTML = material.id;

		let celdaNombre = fila.insertCell(1);
		celdaNombre.innerHTML = material.nombre;

		let celdaCantidad = fila.insertCell(2);
		celdaCantidad.innerHTML = material.cantidad;

		let celdaSeleccionar = fila.insertCell(3);

		let botonSeleccionar = document.createElement("button");

		let iconoSeleccionar = document.createElement("i");
		iconoSeleccionar.className = "mdi mdi-content-copy mx-1";

		botonSeleccionar.appendChild(iconoSeleccionar);

		botonSeleccionar.addEventListener("click", function () {
			$("input[name='Cantidad_Ma']").val(material.cantidad);
			$("#materialSelect").prop("selectedIndex", material.id - 1);
			botonSeleccionado = 1;
		});
		celdaSeleccionar.appendChild(botonSeleccionar);
		/* -----------------------------------------------------*/

		let celdaEliminar = fila.insertCell(4);

		let botonEliminar = document.createElement("button");

		let iconoEliminar = document.createElement("i");
		iconoEliminar.className = "mdi mdi-delete-empty";

		botonEliminar.appendChild(iconoEliminar);

		botonEliminar.addEventListener("click", function () {
			Swal.fire({
				title: "Confirmar eliminación",
				text: "¿Está seguro de que desea eliminar este material?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Sí,eliminar",
				cancelButtonText: "Cancelar",
				confirmButtonColor: "#d33",
				cancelButtonColor: "#3085d6",
				buttonsStyling: true,
			}).then((result) => {
				if (result.isConfirmed) {
					// Acción al presionar Aceptar
					var indiceMaterial = listaMateriales.findIndex(function (elemento) {
						return elemento.id === material.id;
					});
					if (indiceMaterial !== -1) {
						listaMateriales.splice(indiceMaterial, 1);
						actualizarTabla(listaMateriales);
					} else {
						console.log("Material no encontrado en la lista");
					}
				} else {
					console.log("Eliminación cancelada por el usuario");
				}
			});
		});

		// Agregar el botón a la celda
		celdaEliminar.appendChild(botonEliminar);

		/* ----------------------------------------------------*/
	});
}

var listaMateriales = [];

$(document).ready(function () {
	$("#btnAgregar").on("click", function () {
		var id = $("#materialSelect").prop("selectedIndex") + 1;
		var nombre = $("#materialSelect").val();
		var cantidad = $("#Cantidad_Ma").val();
		var idcontrato = localStorage.getItem("IDContrato");
		var idetapa = localStorage.getItem("IDEtapa");
		if (nombre && cantidad) {
			var materialExistente = listaMateriales.find(
				(material) => material.id === id
			);
			if (materialExistente) {
				Swal.fire({
					title: "Verifique",
					text:
						"El material  " +
						nombre +
						" ya está registrado. Por favor, actualízalo en lugar de agregar uno nuevo.",
					icon: "info",
					confirmButtonText: "Aceptar",
					buttonsStyling: true,
				});
				$("#materialSelect").prop("selectedIndex", 0);
				$("#Cantidad_Ma").val("");
			} else {
				var material = {
					id,
					idcontrato,
					idetapa,
					nombre,
					cantidad,
				};
				listaMateriales.push(material);
				$("#materialSelect").prop("selectedIndex", 0);
				$("#Cantidad_Ma").val("");
				console.log(listaMateriales);
				actualizarTabla(listaMateriales);
			}
		} else {
			Swal.fire({
				title: "Seleccione",
				text: "Por favor, seleccione un material y proporcione la cantidad.",
				icon: "info",
				confirmButtonText: "Aceptar",
				buttonsStyling: true,
			});
		}
	});

	//ACTUALIZAR
	$("#btnActualizar").on("click", function () {
		// Obtener el ID del material a actualizar
		var idA = $("#materialSelect").prop("selectedIndex") + 1;
		var cantidadA = $("#Cantidad_Ma").val();

		// Encontrar el índice del material en la lista
		var indiceMaterial = listaMateriales.findIndex(
			(material) => material.id === idA
		);
		// Verificar si se encontró el material
		if (indiceMaterial !== -1) {
			// Obtener los nuevos valores (puedes obtenerlos de algún formulario o de otro lugar)
			// Actualizar la cantidad del material
			listaMateriales[indiceMaterial].cantidad = cantidadA;
			// Actualizar la tabla
			actualizarTabla(listaMateriales);
			$("#materialSelect").prop("selectedIndex", 0);
			$("#Cantidad_Ma").val("");
		} else {
			Swal.fire({
				title: "Verifique",
				text: "Por favor, ingrese un ID válido.",
				icon: "info",
				confirmButtonText: "Aceptar",
				buttonsStyling: true,
			});
		}
	});

	//ATRAS
	$("#btnAtras").on("click", function () {
		window.location.href = "generarOrdenI";
	});

	//LIMPIAR
	$("#btnLimpiar").on("click", function () {
		Swal.fire({
			title: "Limpiar",
			text: "¿Está seguro de que desea limpiar la lista de materiales?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "Sí, limpiar",
			cancelButtonText: "Cancelar",
			confirmButtonColor: "#d33",
			cancelButtonColor: "#3085d6",
			buttonsStyling: true,
		}).then((result) => {
			if (result.isConfirmed) {
				listaMateriales = [];
				console.log("Lista de materiales limpiada");
				actualizarTabla(listaMateriales);
			} else {
				console.log("Limpieza cancelada por el usuario");
			}
		});
	});

	$("#btnAsignarMaterialesBD").on("click", function (event) {
		var idetapa = $("input[name='IDEtapa_M']").val();
		event.preventDefault();
		//Enviar mediante Ajax
		console.log(JSON.stringify(listaMateriales));
		if (idetapa == "") {
			Swal.fire({
				title: "Verifique",
				text: "Por favor, verifique si seleccionó una orden con anterioridad",
				icon: "info",
				confirmButtonText: "Aceptar",
				buttonsStyling: true,
			});
		} else {
			$.ajax({
				url: "registrarMateriales/registrarMateriales",
				type: "POST",
				contentType: "application/json",
				data: JSON.stringify(listaMateriales),
				success: function (response) {
					var mensaje = JSON.parse(response);
					if (idetapa == 1) {
						Swal.fire({
							title: "Registro exitoso",
							confirmButtonText: "Aceptar",
							text: mensaje,
							icon: "success",
							buttonsStyling: true,
							didClose: () => {
								window.location.href = "generarOrdenI";
							},
						});
						localStorage.removeItem("IDContrato");
						localStorage.removeItem("numSum");
					} else if (idetapa == 2) {
						Swal.fire({
							title: "Registro exitoso",
							confirmButtonText: "Aceptar",
							text: mensaje,
							icon: "success",
							buttonsStyling: true,
							didClose: () => {
								window.location.href = "generarOrdenH";
							},
						});
						localStorage.removeItem("IDContrato");
						localStorage.removeItem("numSum");
					}
				},
				error: function (error) {
					//Manejar errores
					console.error(error);
				},
			});
		}
	});
});
