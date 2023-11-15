$(document).ready(function(){

    //Seleccionar
    $(".boton-seleccionar").on("click",function(){
        var dni = $(this).data("dni");
		var nombre = $(this).data("nombre");
		var apellido = $(this).data("apellido");
		var celular = $(this).data("celular");
		var categoria = $(this).data("categoria");

        $("#formularioT").find("#DNI_Em_T").val(dni);
		$("#formularioT").find("#Nombre_Em_T").val(nombre);
		$("#formularioT").find("#Apellido_Em_T").val(apellido);
		$("#formularioT").find("#Celular_Em_T").val(celular);
		$("#formularioT").find("#IDCategoria_T").val(categoria);
    });

    //limpiar
    $("#btnlimpiar").on("click",function(){

        $("#formularioT").find("#DNI_Em_T").val("");
		$("#formularioT").find("#Nombre_Em_T").val("");
		$("#formularioT").find("#Apellido_Em_T").val("");
		$("#formularioT").find("#Celular_Em_T").val("");
		$("#formularioT").find("#IDCategoria_T").val("");
    });
    //Atras
    $("#btnAtras").on("click",function(){
		window.location.href = 'generarOrdenI';
		exit();
	});

   //Asignar
   $('#btnAsignar').on('click', function () {
	    var DNI = $("#formularioT").find("#DNI_Em_T").val();
		var Nombre = $("#formularioT").find("#Nombre_Em_T").val();
		var Apellido = $("#formularioT").find("#Apellido_Em_T").val();

		//Almacenando en el localS
		localStorage.setItem('DNI_Em_T', DNI);
		localStorage.setItem('Nombre_Em_T', Nombre);
		localStorage.setItem('Apellido_Em_T', Apellido);
        
		//Direccionando a otra página
		window.location.href = 'generarOrdenI';
		exit();
	});
});