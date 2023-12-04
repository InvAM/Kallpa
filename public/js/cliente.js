// Datos domicilio
const IDDomicilioInput = $("#IDDomicilio_reg");
const mostrarIDDomicilio = $("#mostrarIDDomicilio");

const DireccionInput = $("#Direccion_Dom_reg");
const mostrarDirec = $("#mostrarDirec");

const InteriorInput = $("#Interior_Dom_reg");
const mostrarInterior = $("#mostrarInterior");

const PisoInput = $("#Piso_Dom_reg");
const mostrarPiso = $("#mostrarPiso");

const MallaInput = $("#Nomb_Malla_Dom_reg");
const mostrarMalla = $("#mostrarMalla");

// Datos cliente
const NombreInput = $("#Nombre_cli_reg");
const mostrarNombre = $("#mostrarNombre");

const ApellidoInput = $("#Apellido_cli_reg");
const mostrarApellido = $("#mostrarApellido");

const DNIInput = $("#DNI_cli_reg");
const mostrarDNI = $("#mostrarDNI");

const CelularInput = $("#Celular_cli_reg");
const mostrarCelular = $("#mostrarCelular");

const FechaInput = $("#FechaNacimiento");
const mostrarFecha = $("#mostrarFecha");

// Datos domicilio
IDDomicilioInput.on("input", function () {
    mostrarIDDomicilio.text(IDDomicilioInput.val());
});

DireccionInput.on("input", function () {
    mostrarDirec.text(DireccionInput.val());
});

InteriorInput.on("input", function () {
    mostrarInterior.text(InteriorInput.val());
});

PisoInput.on("input", function () {
    mostrarPiso.text(PisoInput.val());
});

MallaInput.on("input", function () {
    mostrarMalla.text(MallaInput.val());
});

// Datos cliente
NombreInput.on("input", function () {
    mostrarNombre.text(NombreInput.val());
});

ApellidoInput.on("input", function () {
    mostrarApellido.text(ApellidoInput.val());
});

DNIInput.on("input", function () {
    mostrarDNI.text(DNIInput.val());
});

CelularInput.on("input", function () {
    mostrarCelular.text(CelularInput.val());
});

FechaInput.on("input", function () {
    mostrarFecha.text(FechaInput.val());
});

function updateContenedor() {
    //Datos domicilio
    var condicionSelect = $("#IDCondicion");
    var estratoSelect = $("#IDEstrato_reg");
    var predioSelect = $("#IDPredio_reg");
    var distritoSelect = $("#IDDistrito_reg");

    var mostrarCondicion = $("#mostrarCondicion");
    var mostrarEstrato = $("#mostrarEstrato");
    var mostrarPredio = $("#mostrarPredio");
    var mostrarDistrito = $("#mostrarDistrito");

    mostrarCondicion.text(condicionSelect.find("option:selected").text());
    mostrarEstrato.text(estratoSelect.find("option:selected").text());
    mostrarPredio.text(predioSelect.find("option:selected").text());
    mostrarDistrito.text(distritoSelect.find("option:selected").text());

    //Datos cliente 
    var generoSelect = $("#IDGenero_reg");
    var nacionalidadSelect = $("#IDNacionalidad_reg");
    var estadoSelect = $("#IDEstadoCivil_reg");

    var mostrarGenero = $("#mostrarGenero");
    var mostrarNacionalidad = $("#mostrarNacionalidad");
    var mostrarEstado = $("#mostrarEstado");

    mostrarGenero.text(generoSelect.find("option:selected").text());
    mostrarNacionalidad.text(nacionalidadSelect.find("option:selected").text());
    mostrarEstado.text(estadoSelect.find("option:selected").text());
}
