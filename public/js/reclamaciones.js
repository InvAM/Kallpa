$(document).ready(function(){
    $("#formReclamaciones").submit(function(event){
        event.preventDefault();
        var dni_r = $("#dni_r").val();
        var nombre_r = $("#nombre_r").val();
        var correo_r = $("#correo_r").val();
        var domicilio_r = $("#domicilio_r").val();
        var telefono_r = $("#telefono_r").val();
        var tipo_servicio_r = $("#tipo_servicio_r").val();
        var monto_reclamado_r = $("#monto_reclamado_r").val();
        var descripcion_r = $("#descripcion_r").val();
        var tipo_reclamacion_r = $("#tipo_reclamacion_r").val();
        var detalle_r = $("#detalle_r").val();
        var pedido_r = $("#pedido_r").val();

        var reclamaciones = {
            dni_r :  dni_r,
            nombre_r: nombre_r,
            correo_r: correo_r,
            domicilio_r: domicilio_r,
            telefono_r: telefono_r,
            tipo_servicio_r: tipo_servicio_r,
            monto_reclamado_r: monto_reclamado_r,
            descripcion_r: descripcion_r,
            tipo_reclamacion_r: tipo_reclamacion_r,
            detalle_r: detalle_r,
            pedido_r: pedido_r
        };

        $.ajax({
            url: "reclamacion/registrarReclamaciones",
            type: "POST",
            contentType: "application/json",
			data: JSON.stringify(reclamaciones),
			success: function (response) {
                var mensaje = JSON.parse(response);
                if(mensaje=="Registrado"){
                    Swal.fire({
                        title: 'Registro exitoso',
                        confirmButtonText: 'Aceptar',
                        text: mensaje,
                        icon: 'success',
                        buttonsStyling: true,
                        didClose: () => {
                            window.location.href = 'reclamacion';
                        }
                    });
                }else{
                    Swal.fire({
                        title: 'Registro denegado',
                        confirmButtonText: 'Aceptar',
                        text: mensaje,
                        icon: 'error',
                        buttonsStyling: true,
                        didClose: () => {
                            window.location.href = 'reclamacion';
                        }
                    });
                }
            },
            error: function (error) {
                console.error(error);
            },
        });
        localStorage.removeItem("dni_r");
    });
});