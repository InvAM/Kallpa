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
    
	//Filtro categoria -marca
	$(document).ready(function () {
		$('.checklist input[type="checkbox"]').change(filtrarProductos);
		function filtrarProductos() {
			var subcategoriasSeleccionadas = obtenerSeleccionados('.Filtro1 input:checked');
			var marcasSeleccionadas = obtenerSeleccionados('.Filtro2 input:checked');
			$('.producto').hide();
	
			var datosFiltrado = {
				subcategorias: subcategoriasSeleccionadas,
				marcas: marcasSeleccionadas
			};
	
			$.ajax({
				type: "POST",
				url: "catalogo/filtrado",
				data: JSON.stringify(datosFiltrado),
				dataType: "html", 
				success: function (response) {
					$('.central').html(response);
				},
				error: function (error) {
					console.log(error);
				},
			});
		}
	
		function obtenerSeleccionados(selector) {
			return $(selector).map(function () {
				return this.id;
			}).get();
		}
	});
	

	//Filtro min y max precio
	$(document).ready(function () {
            $("#min-precio, #max-precio").on("input", function () {
                $("#min-valor").text($("#min-precio").val());
                $("#max-valor").text($("#max-precio").val());
				actualizarP();
            });


			function actualizarP() {
				const minPrecioValue = $("#min-precio").val();
				const maxPrecioValue = $("#max-precio").val();
			
				var Precios = {
					minPrecio: minPrecioValue,
					maxPrecio: maxPrecioValue
				}
			
				$.ajax({
					type: "POST",
					url: "catalogo/filtrarprecios",  
					data: JSON.stringify(Precios),
					dataType: "html",
					success: function (response) {
						$('.central').html(response);
					},
					error: function (error) {
						console.log(error);
					}
				});
			}
			
	});
	
	//Orden 
	$(document).ready(function () {
		// Manejar el clic en "De mayor a menor precio"
		
		$(".items").on("click", function (e) {
			e.preventDefault();

			// Obtener el texto de la opción seleccionada
			var opcionSeleccionada = $(this).text();

			// Actualizar el texto de la etiqueta select-selected
			$(".select-selected").html(opcionSeleccionada);

			// Aquí puedes agregar la lógica para realizar la acción deseada al seleccionar una opción
			// Por ejemplo, llamar a una función para ordenar los productos según la opción seleccionada
			var opcionId = $(this).attr('id');
			if (opcionId === 'mayor-menor') {
				ordenarProductos('mayor-menor');
			} else if (opcionId === 'menor-mayor') {
				ordenarProductos('menor-mayor');
			}else if (opcionId === 'todos') {
				ordenarProductos('todos');
			}
		});
		// Función para ordenar los productos según el criterio seleccionado
		function ordenarProductos(criterio) {
			$.ajax({
				type: "POST",
				url: "catalogo/ordenarProducto",  
				data: JSON.stringify(criterio),
				dataType: "html",
				success: function (response) {
					$('.central').html(response);
				},
				error: function (error) {
					console.log(error);
				}
			});
		}
	});
});
