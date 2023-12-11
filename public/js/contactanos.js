$(document).ready(function(){
    $("#btnEnviar").on("click", function(){
        var nombre = $("#nombre_c").val();
        var celular = $("#celular_c").val();
        var correo = $("#correo_c").val();
        var mensaje = $("#mensaje_c").val();
        var direccion = $("#direccion_c").val();

        var contactanosactual={
            nombre: nombre,
            celular: celular,
            correo: correo,
            mensaje: mensaje,
            direccion: direccion
        }

        if(nombre=="" || celular=="" || correo=="" || mensaje=="" || direccion==""){
            Swal.fire({
                title: 'Verifique',
                confirmButtonText: 'Aceptar',
                text: "Por favor verfique los campos adicionales",
                icon: 'info',
                buttonsStyling: true,
            });
        }else{
            $.ajax({
                url: "contactanos/registrarContacto",
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify(contactanosactual),
                success: function (response) {
                    var respuesta = JSON.parse(response);
                    Swal.fire({
                        title: 'Registro exitoso',
                        confirmButtonText: 'Aceptar',
                        text: respuesta.mensaje,
                        icon: 'success',
                        buttonsStyling: true,
                        didClose: () => {
                            $("#nombre_c").val("");
                            $("#celular_c").val("");
                            $("#correo_c").val("");
                            $("#mensaje_c").val("");
                            $("#direccion_c").val("");
                        }
                    });
                },
                error: function(error){
                    console.log(error);
                },
            });
        }
    });
});