function iniciar() {
	if (localStorage.getItem("DNI_Em_T") || localStorage.getItem("numSum")) {
		// Obtener los datos del localStorage de TECNICO
		var dni = localStorage.getItem("DNI_Em_T");
		var nombre = localStorage.getItem("Nombre_Em_T");
		var apellido = localStorage.getItem("Apellido_Em_T");
		var nombreCompleto = " ";
		if (localStorage.getItem("Nombre_Em_T")) {
			var nombreCompleto = nombre + " " + apellido;
		} else {
			var nombreCompleto = " ";
		}

		//Obtener los datos del localStorage de CONTRATO
		var numS = localStorage.getItem("numSum");
		var idContrato = "";
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
	$("#formularioGOI").submit(function (event) {
		event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

		// Recopila los valores de los campos utilizando jQuery
		var IDEtapa_G = $("#IDEtapa_G").val();
		var IDContrato_G = $("#IDContrato_G").val();
		var Fecha = $("#selectedDate").val();
		var DNI_Em_T = $("#DNI_Em_T").val();

		// Llenando arreglo
		var ordenActual = {
			IDEtapa_G: IDEtapa_G,
			IDContrato_G: IDContrato_G,
			Fecha: Fecha,
			DNI_Em_T: DNI_Em_T,
		};

		// Comprobando
        if(DNI_Em_T=="" || Fecha==""){
			Swal.fire({
				title: 'Verifique',
				confirmButtonText: 'Aceptar',
				text: "Por favor verfique los campos adicionales",
				icon: 'info',
				buttonsStyling: true,
			});
		}else{
		// Envía el formulario mediante Ajax
		$.ajax({
			url: "generarOrdenI/registrarOrden",
			type: "POST",
			contentType: "application/json",
			data: JSON.stringify(ordenActual),
			success: function (response) {
				// Manejar la respuesta del servidor (si es necesario)
				var mensaje = JSON.parse(response);
				Swal.fire({
					title: 'Registro exitoso',
					confirmButtonText: 'Aceptar',
					text: mensaje,
					icon: 'success',
					buttonsStyling: true,
					didClose: () => {
						window.location.href = 'generarOrdenI';
					}
				});
			},
			error: function (error) {
				// Manejar errores
				console.error(error);
			},
		});
		localStorage.removeItem("IDContrato");
		localStorage.removeItem("numSum");
		localStorage.removeItem("DNI_Em_T");
		localStorage.removeItem("Nombre_Em_T");
		localStorage.removeItem("Apellido_Em_T");
	    }
	});
});

$(document).ready(function () {
	//AgregarTécnico
	$("#btnAgregarTecnico").on("click", function () {
		//Direccionando a otra página
		window.location.href = "tecnico";
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

	//AgregarMateriales
	$(".btn-small").on("click", function () {
		var idcontrato = $(this).data("idcontrato");
		var idetapa = $(this).data("idetapa");
		var fecha = $(this).data("fecha");
        
		$.ajax({
            url: "generarOrdenI/verificarMaterial",
				type: "POST",
				contentType: "application/json",
				data: JSON.stringify(idcontrato), // Enviar un objeto con propiedad IDContrato
				success: function (response) {
					var mensaje = JSON.parse(response);
					if(mensaje==""){
						localStorage.setItem("IDContrato", idcontrato);
						localStorage.setItem("IDEtapa", idetapa);
						localStorage.setItem("Fecha", fecha);
						window.location.href = "registrarMateriales";
					}else{
						Swal.fire({
							title: 'Acceso denegado',
							confirmButtonText: 'Aceptar',
							text: mensaje,
							icon: 'info',
							buttonsStyling: true,
						});	
					}
				},
				error:function (error){
					console.error(error);
				}
		});
	});
});
