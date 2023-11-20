$(document).ready(function(){

    //Seleccionar
    $(".boton-seleccionar").on("click",function(){
        var dni = $(this).data("dni");
		var nombre = $(this).data("nombre");
		var apellido = $(this).data("apellido");
		var celular = $(this).data("celular");
		var categoria = $(this).data("categoria");

        $("#formularioH").find("#DNI_Em_H").val(dni);
		$("#formularioH").find("#Nombre_Em_H").val(nombre);
		$("#formularioH").find("#Apellido_Em_H").val(apellido);
		$("#formularioH").find("#Celular_Em_H").val(celular);
		$("#formularioH").find("#IDCategoria_H").val(categoria);
    });

    //limpiar
    $("#btnlimpiar").on("click",function(){

        $("#formularioH").find("#DNI_Em_H").val("");
		$("#formularioH").find("#Nombre_Em_H").val("");
		$("#formularioH").find("#Apellido_Em_H").val("");
		$("#formularioH").find("#Celular_Em_H").val("");
		$("#formularioH").find("#IDCategoria_H").val("");
    });
    
    $("#btnAsignar").on("click", function () {
		var DNI = $("#formularioH").find("#DNI_Em_H").val();
		var Nombre = $("#formularioH").find("#Nombre_Em_H").val();
		var Apellido = $("#formularioH").find("#Apellido_Em_H").val();

		//Almacenando en el localS
		localStorage.setItem('DNI_Em_T', DNI);
		localStorage.setItem('Nombre_Em_T', Nombre);
		localStorage.setItem('Apellido_Em_T', Apellido);
        
		//Direccionando a otra página
		window.location.href = 'generarOrdenH';
		exit();
	});
});
