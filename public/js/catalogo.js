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
		Swal.fire({
			title: "¿Agregar producto al carrito?",
			text: "Esta por agregar un producto al carrito " + formData.nombre,
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#33cc33",
			cancelButtonColor: "#d33",
			confirmButtonText: "Sí, agregarlo",
			cancelButtonText: "No, seguir viendo",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: "catalogo/agregarCarrito",
					data: JSON.stringify(formData),
					dataType: "json",
					success: function (response) {
						console.log("Respuesta del servidor : ", response);
						if (response.success) {
							Swal.fire({
								title: "Su producto se agrego con exito",
								text: "¿Desea seguir comprando?",
								icon: "success",
								showCancelButton: true,
								confirmButtonColor: "#33cc33",
								cancelButtonColor: "#d33",
								confirmButtonText: "Sí, seguir comprando",
								cancelButtonText: "No, ir a pagar",
							}).then((result) => {
								if (result.isConfirmed == false) {
									window.location.href = "carrito";
								}
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
			}
		});
	});
});
