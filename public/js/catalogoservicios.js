$(document).ready(function(){
    $("#btnInstalacion").on("click",function(){
       Swal.fire({
       icon: "info",
       title: "Ingrese sus Datos",
       html:
        '<label for="nombres">Nombres:</label>' +
        '<input type="text" id="nombres" class="swal2-input" requerid>' +
        '<label for="celular">Número de Celular:</label>' +
        '<input type="text" id="celular" class="swal2-input" requerid>'+
        '<label for="correo">Correo Electronico:</label>' +
        '<input type="text" id="correo" class="swal2-input" requerid>' +
        '<label for="direccion">Dirección:</label>' +
        '<input type="text" id="direccion" class="swal2-input" requerid>' +
        '<br>',
        confirmButtonText: 'Solicitar',
        confirmButtonColor: "#3085d6",
        showCancelButton: true,
		cancelButtonColor: "#d33",
       preConfirm: () => {
        const direccion = Swal.getPopup().querySelector("#direccion").value;
        const nombres = Swal.getPopup().querySelector("#nombres").value;
        const celular = Swal.getPopup().querySelector("#celular").value;
        const correo = Swal.getPopup().querySelector("#correo").value;

        if (!direccion || !nombres || !celular || !correo) {
            Swal.showValidationMessage("Por favor, complete todos los campos.");
        }
        return { direccion, nombres, celular,correo };
        },
      }).then((result) => {
             if (result.isConfirmed) {
                const { direccion, nombres, celular ,correo} = result.value;
                
                Swal.fire({
                    title: "Confirmación",
                    text: "¿Deseas agregar el servicio de Instalación?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Si, agregar",
                    cancelButtonText: "No, solo este servicio",
                }).then((result) => {
                    if (result.isConfirmed) {
                         var mensaje = "Deseo adquirir el servicio de Instalación y Habilitación";
                    }else{
                        var mensaje = "Deseo solo el servicio de Habilitación";
                    }
                        var Solicitud={
                            nombre: nombres,
                            celular: celular,
                            correo: correo,
                            mensaje: mensaje,
                            direccion: direccion,
                        }
                        $.ajax({
                            url: "contactanos/registrarContacto",
                            type: "POST",
                            contentType: "application/json",
                            data: JSON.stringify(Solicitud),
                            success: function (response) {
                                var respuesta = JSON.parse(response);
                                Swal.fire({
                                    title: 'Solicitud exitosa',
                                    confirmButtonText: 'Aceptar',
                                    text: respuesta.mensaje,
                                    icon: 'success',
                                    buttonsStyling: true,
                                 });
                            },
                            error: function(error){
                                    console.log(error);
                            },
                        });
                });
            } 
    });

        
    });

    $("#btnHabilitacion").on("click", function(){
        Swal.fire({
            icon: "info",
            title: "Ingrese sus Datos",
            html:
             '<label for="nombres">Nombres:</label>' +
             '<input type="text" id="nombres" class="swal2-input" requerid>' +
             '<label for="celular">Número de Celular:</label>' +
             '<input type="text" id="celular" class="swal2-input" requerid>'+
             '<label for="correo">Correo Electronico:</label>' +
             '<input type="text" id="correo" class="swal2-input" requerid>' +
             '<label for="direccion">Dirección:</label>' +
             '<input type="text" id="direccion" class="swal2-input" requerid>' +
             '<br>',
             confirmButtonText: 'Solicitar',
             confirmButtonColor: "#3085d6",
             showCancelButton: true,
             cancelButtonColor: "#d33",
            preConfirm: () => {
             const direccion = Swal.getPopup().querySelector("#direccion").value;
             const nombres = Swal.getPopup().querySelector("#nombres").value;
             const celular = Swal.getPopup().querySelector("#celular").value;
             const correo = Swal.getPopup().querySelector("#correo").value;
     
             if (!direccion || !nombres || !celular || !correo) {
                 Swal.showValidationMessage("Por favor, complete todos los campos.");
             }
             return { direccion, nombres, celular,correo };
             },
           }).then((result) => {
                  if (result.isConfirmed) {
                     const { direccion, nombres, celular ,correo} = result.value;
                     
                     Swal.fire({
                         title: "Confirmación",
                         text: "¿Deseas agregar el servicio de Instalación?",
                         icon: "info",
                         showCancelButton: true,
                         confirmButtonColor: "#d33",
                         cancelButtonColor: "#3085d6",
                         confirmButtonText: "Si, agregar",
                         cancelButtonText: "No, solo este servicio",
                     }).then((result) => {
                         if (result.isConfirmed) {
                              var mensaje = "Deseo adquirir el servicio de Instalación y Habilitación";
                         }else{
                             var mensaje = "Deseo solo el servicio de Habilitación";
                         }
                             var Solicitud={
                                 nombre: nombres,
                                 celular: celular,
                                 correo: correo,
                                 mensaje: mensaje,
                                 direccion: direccion,
                             }
                             $.ajax({
                                 url: "contactanos/registrarContacto",
                                 type: "POST",
                                 contentType: "application/json",
                                 data: JSON.stringify(Solicitud),
                                 success: function (response) {
                                     var respuesta = JSON.parse(response);
                                     Swal.fire({
                                         title: 'Solicitud exitosa',
                                         confirmButtonText: 'Aceptar',
                                         text: respuesta.mensaje,
                                         icon: 'success',
                                         buttonsStyling: true,
                                      });
                                 },
                                 error: function(error){
                                         console.log(error);
                                 },
                             });
                     });
                 } 
         });
     
    });
});