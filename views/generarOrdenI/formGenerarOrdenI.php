<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../../Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Generar Orden Instalación</title>
    <link rel="stylesheet" href="formGenerarOrdenI.css">
</head>

<body>
    <div class="generar-OI">
        <div class="cabecera">
            <div>
                <img src="../../Img/Kallpa.png" class="imagen-kallpa">
            </div>
            <div>
                <img src="../../Img/usuario (3).png" class="imagen-usuario">
            </div>
        </div>

        <div class="contenedorP">
            <div class="tituloP">
                <h2 class="titulo-A">Generar Orden</h2>
                <h2 class="titulo-B">de Instalación</h2>
            </div>
            <div class="contenedor1">
                <div class="imagenOI">
                    <i class="mdi mdi-list-box"></i>
                </div>
                <div class="contenedorS">
                    <div class="cajaOrdenI">
                        <p class="tituloS2">Especificaciones de Orden</p>
                        <input type="text" label="numOrden" placeholder="Número de Orden">
                        <select>
                            <option value="">Seleccione etapa</option>
                            <option value="asesor">Construccion</option>
                            <option value="tecnico">Habilitación</option>
                        </select>
                        <input type="text" label="idEtapa" placeholder="ID Etapa">
                        <input type="text" label="idContrato" placeholder="ID Contrato">
                        <input type="text" label="numS" placeholder="Número de Suministro">
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="contenedorP2">
                <div class="contenedorS2">
                    <div class="CajaCalendario">
                        <p class="TI2">Fecha de ejecución</p>
                        <div class="calendario-wrapper">
                            <input class="calendario" type="date" id="selectedDate" min="2000-01-01" max="2023-12-31"
                                onchange="handleDateSelection(event)">
                        </div>
                    </div>
                    <br>
                    <div class="CajaTecnico">
                        <p class="TI2">Datos del técnico</p>
                        <input class="I2" type="text" label="tecnico" placeholder="Técnico">
                        <input class="I2" type="text" label="dniTecnico" placeholder="DNI de Técnico">
                        <button class="boton">
                            Agregar Técnico
                            <i class="mdi mdi-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="contenedorS3">
                    <p><strong>Órdenes de Instalación</strong></p>
                    <div class="tabla">
                        <table class="custom-table">
                            <thead>
                                <tr>
                                    <th>ID Etapa</th>
                                    <th>ID Contrato</th>
                                    <th>Fecha de Etapa</th>
                                    <th>DNI Empleado</th>
                                    <th>Visualizar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>CO-123</td>
                                    <td>2023-05-20</td>
                                    <td>5432117</td>
                                    <td>
                                        <button class="btn-small btn-primary" onclick="seleccionarOrden(item)">
                                            <i class="mdi mdi-eye-settings mx-1"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!--Más datos -->
                            </tbody>
                        </table>
                    </div>
                    <button class="boton-opciones"> Generar Orden
                        <i class="mdi mdi-book-plus"></i></button>
                    <button class="boton-opciones"> Limpiar
                        <i class="mdi mdi-restore"></i></button>
                    <button class="boton-opciones"> Atras
                        <i class="mdi mdi-keyboard-backspace"></i></button>
                </div>
            </div>
        </div>

        <div class="pie-pagina">
            <p>&copy; 2023 KALLPA. Todos los derechos reservados.</p>
        </div>

    </div>
</body>

</html>