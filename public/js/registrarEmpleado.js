document.addEventListener("DOMContentLoaded", function () {
	const botonesSeleccionar = document.querySelectorAll(".boton-seleccionar");

	botonesSeleccionar.forEach((boton, index) => {
		boton.addEventListener("click", function () {
			// Obtener la fila seleccionada
			const filaSeleccionada = boton.closest("tr");

			// Obtener los datos de la fila y eliminar espacios en blanco
			const dni = filaSeleccionada
				.querySelector("td:nth-child(1)")
				.textContent.trim();
			const nombre = filaSeleccionada
				.querySelector("td:nth-child(2)")
				.textContent.trim();
			const apellido = filaSeleccionada
				.querySelector("td:nth-child(3)")
				.textContent.trim();
			const celular = filaSeleccionada
				.querySelector("td:nth-child(4)")
				.textContent.trim();
			const categoria = filaSeleccionada
				.querySelector("td:nth-child(5)")
				.textContent.trim();

			// Rellenar el formulario con los datos
			document.getElementById("DNI_Em_reg").value = dni;
			document.getElementById("Nombre_Em_reg").value = nombre;
			document.getElementById("Apellido_Em_reg").value = apellido;
			document.getElementById("Celular_Em_reg").value = celular;
			document.getElementById("IDCategoria_reg").value = categoria;

			// Deshabilitar los campos
			document.getElementById("DNI_Em_reg").disabled = true;

			// Prevenir el comportamiento predeterminado del botón
			event.preventDefault();
		});
	});
});
