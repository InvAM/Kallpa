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

        var camposVacios = Object.values(reclamaciones).some(function (valor) {
            return valor.trim() === ""; 
        });
        
        if(camposVacios){
            Swal.fire({
                title: 'Verifique Campos',
                confirmButtonText: 'Aceptar',
                text: "Revise que cada campo haya sido rellenado de forma adecuada",
                icon: 'info',
                buttonsStyling: true,
            });
        }else{
        $.ajax({
            url: "reclamacion/registrarReclamaciones",
            type: "POST",
            contentType: "application/json",
			data: JSON.stringify(reclamaciones),
			success: function (response) {
                var respuesta = JSON.parse(response);
                if(!respuesta.mensaje){
                    Swal.fire({
                        title: 'Registro denegado',
                        confirmButtonText: 'Aceptar',
                        text: "Lo sentimos, no está registrado",
                        icon: 'error',
                        buttonsStyling: true,
                        didClose: () => {
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
                        }
                    });
                }else{
                    Swal.fire({
                        title: 'Registro exitoso',
                        confirmButtonText: 'Aceptar',
                        text: respuesta.mensaje,
                        icon: 'success',
                        buttonsStyling: true,
                        didClose: () => {
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
                        }
                    });
                }
            },
            error: function (error) {
                console.error(error);
            },
        });
       }
        localStorage.removeItem("dni_r");
    });
});