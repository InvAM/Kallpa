$(document).ready(function(){
    //Seleccionar
    $(".boton-seleccionar").on("click",function(){
       var id = $(this).data("id");
       var fecha = $(this).data("fecha");
       var sum  = $(this).data("sum");
       var estado = $(this).data("estado");
       var radi = "R23-"+$(this).data("radi") ;

       $("#formularioVC").find("#IDContrato_VC").val(id);
       $("#formularioVC").find("#Fecha_VC").val(fecha);
       $("#formularioVC").find("#NumerodeSuministro_VC").val(sum);
       $("#formularioVC").find("#Estado_VC").val(estado);
       $("#formularioVC").find("#NumerodeRadicado_VC").val(radi);
    });

    //limpiar
    $("#btnLimpiar").on("click",function(){
 
        $("#formularioVC").find("#IDContrato_VC").val("");
        $("#formularioVC").find("#Fecha_VC").val("");
        $("#formularioVC").find("#NumerodeSuministro_VC").val("");
        $("#formularioVC").find("#Estado_VC").val("");
        $("#formularioVC").find("#NumerodeRadicado_VC").val("");
     });

     //Atras
     $("#btnAtras").on("click",function(){
        //Direccionando a otra página
		window.location.href = 'menu';
		exit();
     });

     //Orden de Instalación
     $('#btnOrdenI').on('click', function () {
	    var IDContrato = $("#formularioVC").find("#IDContrato_VC").val();
		var NumS = $("#formularioVC").find("#NumerodeSuministro_VC").val();
        //limpiado LocalS
        localStorage.clear();
		//Almacenando en el localS
		localStorage.setItem('IDContrato', IDContrato);
		localStorage.setItem('numSum', NumS);

        $("#formularioVC").find("#IDContrato_VC").val("");
        $("#formularioVC").find("#Fecha_VC").val("");
        $("#formularioVC").find("#NumerodeSuministro_VC").val("");
        $("#formularioVC").find("#Estado_VC").val("");
        $("#formularioVC").find("#NumerodeRadicado_VC").val("");
		//Direccionando a otra página
		window.location.href = 'generarOrdenI';
	});
});