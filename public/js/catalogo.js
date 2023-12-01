$(document).ready(function () {
	$(".comprar-btn").on("click", function (event) {
		event.preventDefault();

		var producto = $(this).closest(".producto"); // Obtén el contenedor del producto más cercano

		var formData = {
			nombre: producto.find("span[name='nombre']").text(),
			cuota: producto.find("span[name='cuota']").text(),
			precio1: producto.find("span[name='precio1']").text(),
			precio2: producto.find("span[name='precio2']").text(),
		};
		console.log("Antes del ajax", formData);

		$.ajax({
			type: "POST",
			url: "catalogo/agregarCarrito",
			data: JSON.stringify(formData),
			dataType: "json",
			success: function (response) {
				console.log("Respuesta del servidor : ", response);
				if (response.success) {
					Swal.fire({
						icon: "success",
						title: "¿Desea agregar el producto?",
						text: response.message,
					}).then(() => {
						// Redirige a otra página después de hacer clic en "OK"
						window.location.href = "verCatalogo";
					});
				} else {
					Swal.fire({
						icon: "error",
						title: "Error",
						text: response.message,
					});
				}
			},
		});
	});
});
