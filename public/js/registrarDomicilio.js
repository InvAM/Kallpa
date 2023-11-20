$(document).ready(function (){
    $(".boton-seleccionar").on("click", function () {
        var idDom = $(this).data("idDom");
        var direccion = $(this).data("direccion");
        var interior = $(this).data("interior");
        var piso = $(this).data("piso");
        var malla = $(this).data("malla");
        var condicion = $(this).data("condicion");
        var estrato = $(this).data("estrato");
        var predio = $(this).data("predio");
        var distrito = $(this).data("distrito");

        $("formularioD").find("#IDDomicilio_reg").val(idDom);
        $("formularioD").find("#Direccion_Dom_reg").val(direccion);
        $("formularioD").find("#Interior_Dom_reg").val(interior);
        $("formularioD").find("#Piso_Dom_reg").val(piso);
        $("formularioD").find("#Nomb_Malla_Dom_reg").val(malla);
        $("formularioD").find("#IDCondicion_reg").val(condicion);
        $("formularioD").find("#IDEstrato_reg").val(estrato);
        $("formularioD").find("#IDPredio_reg").val(predio);
        $("formularioD").find("#IDDistrito_reg").val(distrito);
    }) ;

    // Manejar el clic del botón "Actualizar"
	$("#btnActualizar").on("click", function () {
		// Cambiar el atributo "action" del formulario antes de enviarlo
		$("#formularioE").attr("action", "registrarDomicilio/actualizarDomicilio");
		$.ajax({
			type: "POST",
			url: $("#formularioD").attr("action"),
			data: $("#formularioD").serialize(),
			success: function (response) {
				// Manejar la respuesta del servidor
				console.log(response);

				// Parsear la respuesta JSON
				var responseData = JSON.parse(response);

				if (responseData.success) {
					// Redirigir a la URL especificada en la respuesta
					window.location.href = responseData.redirect;
				} else {
					// Manejar el caso de actualización fallida
					console.error(responseData.mensaje);
				}
			},
			error: function (error) {
				// Manejar errores si es necesario
				console.error(error);
			},
		});
	});
});