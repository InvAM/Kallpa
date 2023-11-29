var binaryImageData = "";
function previewImage(input) {
	var file = input.files[0];

	if (file) {
		var reader = new FileReader();

		reader.onload = function (e) {
			document.getElementById("modal-image").src = e.target.result;
			document.getElementById("preview-link").style.display = "block";
			binaryImageData = e.target.result.split(",")[1]; // Actualizar la variable global
		};

		reader.readAsDataURL(file);
	}
}

$(document).ready(function () {
	$("#btnRegistrar").on("click", function (event) {
		event.preventDefault();
		var formData = {
			IDProducto: $("input[name='IDProducto']").val(),
			nombre: $("input[name='nombre']").val(),
			precio: $("input[name='precio']").val(),
			cuota: $("input[name='cuota']").val(),
			IDCategoriaP: $("select[name='IDCategoriaP']").val(),
			IDMarcaP: $("select[name='IDMarcaP']").val(),
			imagen: binaryImageData,
		};

		// Imprimir información para verificar
		console.log(formData);

		$.ajax({
			type: "POST",
			url: "registrarProducto/registrarNuevoProducto",
			data: JSON.stringify(formData),
			contentType: "application/json",
			dataType: "json",
			success: function (response) {
				if (response.success) {
					Swal.fire({
						icon: "success",
						title: "Producto registrado correctamente",
						text: response.message,
					}).then(() => {
						location.reload();
					});
				} else {
					Swal.fire({
						icon: "error",
						title: "No se puede registrar el Producto",
						text: response.message,
					});
				}
			},
			error: function (error) {
				console.error("Error en la petición AJAX", error);
			},
		});
	});
});
