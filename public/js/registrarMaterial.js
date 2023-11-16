function iniciar() {
    if (localStorage.getItem('IDContrato')) {
        
        //Obtener los datos del localStorage de ORDEN
        var idcontrato= localStorage.getItem('IDContrato');
        var idetapa= localStorage.getItem('IDEtapa');
        var fecha= localStorage.getItem('Fecha');

        
        console.log("Fecha"+fecha);
        $("input[name='IDContrato_M']").val(idcontrato);
        $("input[name='IDEtapa_M']").val(idetapa);
        $("input[name='Fecha_O']").val(fecha);
    }
}


document.addEventListener('DOMContentLoaded', iniciar);

//Actualizar Tabla  
function actualizarTabla($lista) {

    var listaMateriales = $lista;
    // Obtener el tbody de la tabla
    let tbodyTabla = document.getElementById('tablaMateriales').getElementsByTagName('tbody')[0];

    // Limpiar contenido existente en el tbody
    tbodyTabla.innerHTML = '';

    // Iterar sobre el array y agregar filas al tbody
    listaMateriales.forEach(material => {
        let fila = tbodyTabla.insertRow(); // Crear una nueva fila

        // Crear celdas y asignar valores
        let celdaID = fila.insertCell(0);
        celdaID.innerHTML = material.id;

        let celdaNombre = fila.insertCell(1);
        celdaNombre.innerHTML = material.nombre;

        let celdaCantidad = fila.insertCell(2);
        celdaCantidad.innerHTML = material.cantidad;
        
         /*FUNCIONAMIENTO DE BOTON SELECCIONAR*/   
        let celdaSeleccionar = fila.insertCell(3);
            //Creando el boton para seleccionar
            let botonSeleccionar =document.createElement("button");
            //Creando icono
            let iconoSeleccionar =document.createElement("i");
            iconoSeleccionar.className="mdi mdi-content-copy mx-1";
            //Agregando icono
            botonSeleccionar.appendChild(iconoSeleccionar);
            
            botonSeleccionar.addEventListener("click",function(){
                $("input[name='Cantidad_Ma']").val(material.cantidad);
                $("#materialSelect").prop('selectedIndex', material.id -1);
            });
         celdaSeleccionar.appendChild(botonSeleccionar);
         /* -----------------------------------------------------*/  

         /*FUNCIONAMIENTO DE BOTON ELIMINAR*/   
        let celdaEliminar = fila.insertCell(4);
            // Crear el botón y asignar propiedades
            let botonEliminar = document.createElement("button");
            // Crear el elemento <i> con la clase del icono
            let iconoEliminar = document.createElement("i");
            iconoEliminar.className = "mdi mdi-delete-empty";
            // Agregar el icono al botón
            botonEliminar.appendChild(iconoEliminar);

            botonEliminar.addEventListener("click", function () {

                var confirmacion = confirm("¿Está seguro de que desea eliminar este material?");
                if (confirmacion) {
                    var indiceMaterial = listaMateriales.findIndex(function (elemento) {
                        return elemento.id === material.id;
                    });
                    if (indiceMaterial !== -1) {
                        listaMateriales.splice(indiceMaterial, 1);
                        actualizarTabla(listaMateriales);
                    } else {
                        console.log("Material no encontrado en la lista");
                    }
                } else {
                    console.log("Eliminación cancelada por el usuario");
                }
            });
            
            
            // Agregar el botón a la celda
            celdaEliminar.appendChild(botonEliminar);

         /* ----------------------------------------------------*/  
    });
}



//ACCIONES DE BOTONES
// Lista de materiales persistente
var listaMateriales = [];

$(document).ready(function () {
    //AGREGAR
    $("#btnAgregar").on("click", function () {
        var id = $("#materialSelect").prop('selectedIndex') + 1;
        var nombre = $("#materialSelect").val();
        var cantidad = $("#Cantidad_Ma").val();
        var idcontrato= localStorage.getItem('IDContrato');
        var idetapa= localStorage.getItem('IDEtapa');

        // Validar que se haya seleccionado un material y la cantidad
        if (nombre && cantidad) {
            // Verificar si ya existe un material con el mismo ID
            var materialExistente = listaMateriales.find(material => material.id === id);

            if (materialExistente) {
                // Si el material ya existe, mostrar un mensaje
                alert("El material  " + nombre + " ya está registrado. Por favor, actualízalo en lugar de agregar uno nuevo.");
                $("#materialSelect").prop('selectedIndex', 0);
                $("#Cantidad_Ma").val("");
            } else {
                // Crear el objeto material
                var material = {
                    id,
                    idcontrato,
                    idetapa,
                    nombre,
                    cantidad
                };


                // Agregar el nuevo objeto al arreglo persistente
                listaMateriales.push(material);
                
                // Limpiar los campos después de agregar el material
                $("#materialSelect").prop('selectedIndex', 0);
                $("#Cantidad_Ma").val("");
                console.log(listaMateriales);
                // Actualizar la tabla en tiempo real
                actualizarTabla(listaMateriales);
            }
        } else {
            alert("Por favor, seleccione un material y proporcione la cantidad.");
        }
    });

    //ACTUALIZAR
    $("#btnActualizar").on("click", function () {
        // Obtener el ID del material a actualizar
        var idA =$("#materialSelect").prop('selectedIndex')+1;
        var cantidadA= $("#Cantidad_Ma").val();

            // Encontrar el índice del material en la lista
        var indiceMaterial = listaMateriales.findIndex(material => material.id === idA);
            // Verificar si se encontró el material
         if (indiceMaterial !== -1) {
                // Obtener los nuevos valores (puedes obtenerlos de algún formulario o de otro lugar)
                // Actualizar la cantidad del material
                listaMateriales[indiceMaterial].cantidad = cantidadA;
                // Actualizar la tabla
                actualizarTabla(listaMateriales);
                console.log("Material actualizado:", listaMateriales[indiceMaterial]);
                $("#materialSelect").prop('selectedIndex',0);
                $("#Cantidad_Ma").val("");
        } else {
            alert("Por favor, ingrese un ID válido.");
        }
    });

    //ATRAS
    $("#btnAtras").on("click", function(){
        window.location.href = 'generarOrdenI';
    });

    //LIMPIAR
    $("#btnLimpiar").on("click",function(){
        var confirmacion = confirm("¿Está seguro de que desea limpiar la lista de materiales?");

        if (confirmacion) {
            // Limpiar completamente el array listaMateriales
            listaMateriales = [];
            console.log("Lista de materiales limpiada");
            actualizarTabla(listaMateriales);
        } else {
            console.log("Limpieza cancelada por el usuario");
        }
    });

    $('#formularioRM').submit(function(event){
        event.preventDefault(); 
       //Enviar mediante Ajax
       console.log(JSON.stringify(listaMateriales));
       $.ajax({
           url: 'registrarMateriales/registrarMateriales',
           type: 'POST',
           contentType: 'application/json',
           data: JSON.stringify(listaMateriales),
           success:function(response){
                console.log(response);
                window.location.href='generarOrdenI';
           },
           error: function(error){
                //Manejar errores
                console.error(error);
           }
       });
    });
});


