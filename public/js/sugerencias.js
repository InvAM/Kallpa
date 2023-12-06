$(document).ready(function(){
    $("#btnRegistrarS").on("click", function(){
        //Recopilando datos
        var DNI_cli= $("#Dni").val();
        var nombres= $("#nombres_s").val();
        var apellidos= $("#apellidos_s").val();
        var email= $("#email_s").val();
        var comentario= $("#comentario_s").val();

        var sugerenciaactual={
            DNI_cli: DNI_cli,
            nombres: nombres,
            apellidos: apellidos,
            email: email,
            comentario: comentario
        }

       //Comprobando campos
        if(comentario=="" || comentario==" "){
            Swal.fire({
                title: 'Verifique',
                confirmButtonText: 'Aceptar',
                text: "Por favor verfique los campos adicionales",
                icon: 'info',
                buttonsStyling: true,
            });
        }else{
        $.ajax({
            url: "sugerencias/registrarSugerencia",
			type: "POST",
			contentType: "application/json",
			data: JSON.stringify(sugerenciaactual),
			success: function (response) {
                var respuesta = JSON.parse(response);
                if(!respuesta.mensaje){
                    Swal.fire({
                        title: 'Observación',
                        confirmButtonText: 'Aceptar',
                        text: "Lo sentimos, no esta registrado",
                        icon: 'error',
                        buttonsStyling: true,
                        didClose: () => {
                            $("#nombres_s").val("");
                            $("#apellidos_s").val("");
                            $("#Dni").val("");
                            $("#email_s").val("");
                            $("#comentario_s").val("");
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
                            $("#nombres_s").val("");
                            $("#apellidos_s").val("");
                            $("#Dni").val("");
                            $("#email_s").val("");
                            $("#comentario_s").val("");
                        }
                    });
                }
            },
            error: function(error){
                console.log(error);
            },
        });
        }
    });

    $("#btnLimpiarS").on("click", function(){
        $("#nombres_s").val("");
        $("#apellidos_s").val("");
        $("#Dni").val("");
        $("#email_s").val("");
		$("#comentario_s").val("");
    });

});