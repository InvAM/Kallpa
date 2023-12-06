$(document).ready(function () {
	$(".btnEliminar").on("click", function () {
		var nombreProducto = $(this)
			.closest("tr")
			.find(".nombreProducto")
			.text()
			.trim();

		Swal.fire({
			title: "¿Estás seguro?",
			text: "¡No podrás revertir esto!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#d33",
			cancelButtonColor: "#3085d6",
			confirmButtonText: "Sí, eliminarlo",
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: "catalogo/eliminarDelCarrito",
					method: "POST",
					data: { nombre: nombreProducto },
					success: function (response) {
						if (response.success) {
							Swal.fire({
								icon: "success",
								title: "Producto eliminado correctamente",
								text: response.message,
							}).then(() => {
								location.reload();
							});
						} else {
							Swal.fire({
								icon: "error",
								title: "No se puede eliminar el producto",
								text: response.message,
							});
						}
					},
					error: function (error) {
						console.error("Error en la petición AJAX", error);
						console.log("Respuesta del servidor:", error.responseText);
					},
				});
			}
		});
	});
});
