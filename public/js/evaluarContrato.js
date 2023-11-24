$(document).ready(function(){
    //Seleccionar
    $(".btn-selec").on("click",function(){
        var id = $(this).data("id");
        var nums = $(this).data("nums");
        var dni  = $(this).data("dni");
        var estado = $(this).data("estado");

        $("#formularioEV").find("#IDContrato").val(id);
        $("#formularioEV").find("#numSum").val(nums);
        $("#formularioEV").find("#DNI_cli").val(dni);
        $("#formularioEV").find("#selectedEstado option").filter(function() {
            return $(this).text() === estado;
        }).prop("selected", true);
    });

    //limpiar
    $("#limpiar").on("click",function(){
        $("#formularioEV").find("#IDContrato").val("");
        $("#formularioEV").find("#numSum").val("");
        $("#formularioEV").find("#DNI_cli").val("");
        $("#formularioEV").find("#selectedEstado").val($("#formularioEV").find("#selectedEstado option:first").val());
    });

    //limpiar filtros
    $("#btn-limp").on("click",function(){
            // Limpiar valores de los campos de filtro
            $("#filtroIDContrato").val(""); // Limpiar el campo de ID de Contrato
            $("#searchEstado").val(""); // Restablecer el valor del select de Estado
            $("#searchFecha").val(""); // Restablecer el valor del campo de fecha
    
            // Restablecer la lógica de filtrado para mostrar todas las filas nuevamente
            $('#filtroIDContrato, #searchEstado, #searchFecha').trigger('input');
    });

    //Atras
    $("#volverMenu").on("click",function(){
		window.location.href = 'menu';
		exit();
    });

    $('#filtroIDContrato').on('input', function() {
        var filtro = $(this).val().toLowerCase(); // Obtener el valor del campo de ID del contrato y convertirlo a minúsculas

        // Recorrer todas las filas de la tabla
        $('table tbody tr').each(function() {
            var idContrato = $(this).find('td:first').text().toLowerCase(); // Obtener el ID del contrato de la primera columna de la fila y convertirlo a minúsculas

            // Mostrar u ocultar la fila según el filtro
            if (idContrato.indexOf(filtro) > -1) {
                $(this).show(); // Mostrar la fila si el ID del contrato coincide con el filtro
            } else {
                $(this).hide(); // Ocultar la fila si no coincide con el filtro
            }
        });
    });

    $('#searchFecha').on('change', function() {
        var selectedDate = $(this).val();

        // Iterar a través de las filas de la tabla para mostrar/ocultar según la fecha seleccionada
        $('table tbody tr').each(function() {
            var fechaContrato = $(this).find('td:eq(1)').text(); // Cambia el índice si la posición de la fecha es diferente

            // Comparar las fechas y mostrar/ocultar la fila según la coincidencia
            if (fechaContrato.trim() === selectedDate.trim()) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    $('#searchEstado').on('input', function() {
        var selectedEstado = $(this).val().trim(); // Obtiene el valor seleccionado y elimina espacios en blanco

        $('table tbody tr').each(function() {
            var estadoContrato = $(this).find('td:nth-child(6)').text().trim(); // Obtiene el estado de cada fila y elimina espacios en blanco
            if (selectedEstado === '' || estadoContrato === selectedEstado) {
                $(this).show(); // Muestra la fila si coincide con el estado seleccionado o si no se ha seleccionado ningún estado
            } else {
                $(this).hide(); // Oculta la fila si no coincide con el estado seleccionado
            }
        });
    });

});