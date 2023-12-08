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
$(document).on("click", ".btnVisualizar", function () {
    var imagenBase64 = $(this).closest("tr").find(".seleccionar-btn").data("imagen");
    var nombreProducto = $(this).closest("tr").find(".seleccionar-btn").data("nombre");

    var imagenDecodificada = atob(imagenBase64);

    Swal.fire({
        title: 'Visualización del Producto',
        html: '<img src="data:image/jpeg;base64,' + btoa(imagenDecodificada) + '" alt="Imagen del Producto" style="max-width: 100%;">' +
            '<p style="margin-top: 10px;font-weight: bold;"> Producto: ' + nombreProducto + '</p>',
        showCloseButton: true,
        showConfirmButton: false
    });
});
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
		document.addEventListener('DOMContentLoaded', function () {
			var seleccionarButtons = document.querySelectorAll('.seleccionar-btn');

			seleccionarButtons.forEach(function (button) {
				button.addEventListener('click', function () {
					var imagenBase64 = this.dataset.imagen; // Obtener la imagen en Base64 desde el atributo data
					var imagenSeleccionada = atob(imagenBase64); // Decodificar la imagen Base64
					var IDProducto = $(this).data("idproducto");
					var nombre = $(this).data("nombre");
					var precio = $(this).data("precio");
					var cuota = $(this).data("cuota");
					var IDCategoriaP = $(this).data("categoria") - 1;
					var IDMarcaP = $(this).data("marca") - 1;

					$("#formProducto").find("#IDProducto").val(IDProducto);
					$("#formProducto").find("#nombre").val(nombre);
					$("#formProducto").find("#precio").val(precio);
					$("#formProducto").find("#cuota").val(cuota);
					$("#formProducto").find("#IDCategoriaP").prop("selectedIndex", IDCategoriaP);
					$("#formProducto").find("#IDMarcaP").prop("selectedIndex", IDMarcaP);
					mostrarImagen(imagenSeleccionada);
				});
			});

			function mostrarImagen(imagen) {
				var imagenElement = $("#formProducto").find(".image-preview")[0];

				if (imagen) {
					imagenElement.src = "data:image/jpeg;base64," + btoa(imagen);
				} else {
					imagenElement.src = "../../../Kallpa/public/Img/Kallpa1.png";
				}
			}
		});
		$("#btnActualizar").on("click", function (event) {
			event.preventDefault();
			var formData = {
				IDProducto: $("input[name='IDProducto']").val(),
				nombre: $("input[name='nombre']").val(),
				precio: $("input[name='precio']").val(),
				cuota: $("input[name='cuota']").val(),
				IDCategoriaP: $("select[name='IDCategoriaP']").val(),
				IDMarcaP: $("select[name='IDMarcaP']").val(),
				imagen: binaryImageData,  // Solo enviar la nueva imagen si se ha cargado
			};
	
			Swal.fire({
				title: "Estás por actualizar el producto",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#33cc33",
				cancelButtonColor: "red",
				confirmButtonText: "Sí, actualizar",
			}).then((result) => {
				if (result.isConfirmed) {
					actualizarProducto(formData);
				}
			});
		});
	
		document.addEventListener('DOMContentLoaded', function () {
			var seleccionarButtons = document.querySelectorAll('.seleccionar-btn');
	
			seleccionarButtons.forEach(function (button) {
				button.addEventListener('click', function () {
					var imagenBase64 = this.dataset.imagen; // Obtener la imagen en Base64 desde el atributo data
					var imagenSeleccionada = atob(imagenBase64); // Decodificar la imagen Base64
					var IDProducto = $(this).data("idproducto");
					var nombre = $(this).data("nombre");
					var precio = $(this).data("precio");
					var cuota = $(this).data("cuota");
					var IDCategoriaP = $(this).data("categoria") - 1;
					var IDMarcaP = $(this).data("marca") - 1;
	
					$("#formProducto").find("#IDProducto").val(IDProducto);
					$("#formProducto").find("#nombre").val(nombre);
					$("#formProducto").find("#precio").val(precio);
					$("#formProducto").find("#cuota").val(cuota);
					$("#formProducto").find("#IDCategoriaP").prop("selectedIndex", IDCategoriaP);
					$("#formProducto").find("#IDMarcaP").prop("selectedIndex", IDMarcaP);
					mostrarImagen(imagenSeleccionada);
				});
			});
			
			function mostrarImagen(imagen) {
				var imagenElement = $("#formProducto").find(".image-preview")[0];
	
				if (imagen) {
					imagenElement.src = "data:image/jpeg;base64," + btoa(imagen);
				} else {
					// No establecer ninguna imagen si no hay imagen proporcionada
					imagenElement.removeAttribute("src");
				}
			}
		});
		
	
		function actualizarProducto(formData) {
			$.ajax({
				type: "POST",
				url: "registrarProducto/actualizarProducto",
				data: JSON.stringify(formData),
				contentType: "application/json",
				dataType: "json",
				success: function (response) {
					if (response.success) {
						Swal.fire({
							icon: "success",
							title: "Producto actualizado correctamente",
							text: response.message,
						}).then(() => {
							location.reload();
						});
					} else {
						Swal.fire({
							icon: "error",
							title: "No se puede actualizar el producto",
							text: response.message,
						});
					}
				},
				error: function (error) {
					console.error("Error en la petición AJAX", error);
				},
			});
		}
		$(document).on("click", ".btnEliminar", function()  {
			var formData = {
				idproducto: $(this).closest("tr").find(".idproductoColumn").text().trim(),
			};
		
			Swal.fire({
				title: "¿Estás seguro?",
				text: "¡No podrás revertir esto!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#d33",
				cancelButtonColor: "#3085d6",
				confirmButtonText: "Sí, eliminar",
			}).then((result) => {
				if (result.isConfirmed) {
					console.log("Antes de la petición AJAX");
					$.ajax({
						type: "POST",
						url: "registrarProducto/eliminarProducto",
						data: JSON.stringify(formData),
						contentType: "application/json",
						dataType: "json",
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
									title: "No se puede eliminar el Producto",
									text: response.message,
								});
							}
						},
						error: function (error) {
							console.error("Error en la petición AJAX", error);
						},
					});
					
				}
			});
		});
		
		
