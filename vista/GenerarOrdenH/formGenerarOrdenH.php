<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../../../Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Generar Orden Habilitación</title>
    <link rel="stylesheet" href="../../estilos/GenerarOrdenH/formGenerarOrdenH.css">
</head>
<body>
    <div class="generar-OH">
        <div class="cabecera">
            <div>
                <img src="../../../Img/Kallpa.png" class="imagen-kallpa">
            </div>
            <div>
                <img src="../../../Img/usuario (3).png" class="imagen-usuario">
            </div>
        </div>

        <div class="contenedorPH">
            <div class="tituloP">
                    <h2 class="titulo-A">Generar Orden</h2>
                    <h2 class="titulo-B">de Habilitación</h2>
            </div>
            <div class="contenedor1">
                <div class="imagenOH">
                    <i class="mdi mdi-format-list-checkbox"></i>
                </div>
                <div class="contenedorS">
                    <div class="cajaOrdenH">
                        <p class="tituloS2">Especificaciones de Orden</p>
                        <input type="text" label="numOrden" placeholder="Número de Orden">
                        <select>
                            <option value="">Seleccione etapa</option>
                            <option value="Construccion">Construccion</option>
                            <option value="Habilitación">Habilitación</option>
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
                        <input class="calendario" type="date" id="selectedDate" min="2000-01-01" max="2023-12-31" onchange="handleDateSelection(event)">
                    </div>
                </div>
                <br>
                <div class="CajaHabilitador">
                        <p class="TI2">Datos del Habilitador</p>
                        <input class="I2" type="text" label="habilitador" placeholder="habilitador">
                        <input  class="I2" type="text" label="dniHabilitador" placeholder="DNI del Habilitador ">
                        <button class="boton">
                            Agregar Habilitador
                            <i class="mdi mdi-plus"></i>
                        </button>
                </div>  
              </div> 
              <div class="contenedorS3">
                <p><strong>Órdenes de Habilitación</strong></p>
                <div class="tabla-H">
                    <table class="custom-table-H">
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
                <button class="boton-opciones-H"> Generar Orden
                       <i class="mdi mdi-book-plus"></i></button>
                <button class="boton-opciones-H"> Limpiar
                       <i class="mdi mdi-restore"></i></button>
                <button class="boton-opciones-H"> Atras
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
 