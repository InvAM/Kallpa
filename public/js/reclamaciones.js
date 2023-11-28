$(document).ready(function(){
    $("#formReclamaciones").submit(function(event){
        event.preventDefault();
        var DNI_cli = $("#dni_r").val();
        var nombre = $("#nombre_r").val();
        var correo = $("#correo_r").val();
        var domicilio = $("#domicilio_r").val();
        var telefono = $("#telefono_r").val();
        var tiposervicio = $("#tipo_servicio_r").val();
        var montoreclamado = $("#monto_reclamado_r").val();
        var descripcion = $("#descripcion_r").val();
        var tiporeclamacion = $("#tipo_reclamacion_r").val();
        var detalle = $("#detalle_r").val();
        var pedido = $("#pedido_r").val();

        var reclamaciones = {
            DNI_cli:  DNI_cli,
            nombre: nombre,
            correo: correo,
            domicilio: domicilio,
            telefono: telefono,
            tiposervicio: tiposervicio,
            montoreclamado: montoreclamado,
            descripcion: descripcion,
            tiporeclamacion: tiporeclamacion,
            detalle: detalle,
            pedido: pedido
        };

        console.log(reclamaciones);

        $.ajax({
            url: "reclamaciones/registrarReclamaciones",
            type: "POST",
            contentType: "application/json",
			data: JSON.stringify(reclamaciones),
			success: function (response) {
                alert(response);
                $("#dni_r").val("");
                $("#nombre_r").val("");
                $("#correo_r").val("");
                $("#domicilio_r").val("");
                $("#telefono_r").val("");
                $("#tipo_servicio_r").prop("selectedIndex", 0);
                $("#monto_reclamado_r").val("");
                $("#descripcion_r").val("");
                $("#tipo_reclamacion_r").prop("selectedIndex", 0);
                $("#detalle_r").val("");
                $("#pedido_r").val("");
            },
            error: function (error) {
                console.error(error);
            },
        });
    });
});