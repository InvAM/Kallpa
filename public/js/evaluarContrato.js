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

     //Atras
    $("#volverMenu").on("click",function(){
        //Direccionando a otra página
		window.location.href = 'menu';
		exit();
    });

});