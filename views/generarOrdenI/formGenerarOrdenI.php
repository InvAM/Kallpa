<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Generar Orden Instalación</title>
    <link rel="stylesheet" href="public/css/formGenerarOrdenI.css">
</head>

<body>
  <div class="generar-OI">
        <?php require_once "views/header.php" ?>

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
                <p class="tituloS2">Especificaciones de Orden</p><br>
                    <div class="cajaOrdenI">
                    <form action="<?php echo constant('URL'); ?>generarOrdenI/registrarOrden" name="formularioGOI1" id="formularioGOI1" method="POST">  
                        <div class="subcajita">
                            <label class="Sub" >Número de Orden</label><br>
                            <input type="text" label="numOrden" id="numOrden_G" name="numOrden_G" placeholder="Número de Orden" readonly>
                        </div>
                        <div class="subcajita">
                            <label class="Sub" >Etapa</label><br>
                            <select readonly>
                                <option value="asesor">Instalación</option>
                                <option value="tecnico">Habilitación</option>
                            </select>
                        </div>
                        <div class="subcajita">
                            <label class="Sub" >ID Etapa</label><br>
                            <input type="text" label="idEtapa" placeholder="ID Etapa" name="IDEtapa_G" id="IDEtapa_G"value="1" readonly>
                        </div>
                        <div class="subcajita">
                            <label class="Sub" >ID de Contrato</label><br>
                            <input type="text" label="idContrato" placeholder="ID Contrato" id="IDContrato_G" name="IDContrato_G" readonly>
                        </div>
                        <div class="subcajita">
                            <label class="Sub" >Número de Suministro</label><br>
                            <input type="text" label="numS" placeholder="Número de Suministro" id="NumS_G" name="NumS_G" readonly>
                        </div>
                    </form>
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
                            <input class="calendario" type="date" id="selectedDate" name="selectedDate" min="2000-01-01" max="2023-12-31"
                                onchange="handleDateSelection(event)">
                        </div>
                    </div>
                    <br>
                    <div class="CajaTecnico">
                        <p class="TI2">Datos del técnico</p>
                        <form action="<?php echo constant('URL'); ?>generarOrdenI/registrarOrden" name="formularioGOI2" id="formularioGOI2" method="POST">  
                        <label class="Sub" for="NombreCompleto_Em">Técnico</label>
                        <input class="I2" type="text" id="NombreCompleto_Em" name="NombreCompleto_Em" placeholder="Técnico" 
                               value=""readonly>
                        <label class="Sub" for="DNI_Em_T">Dni del Técnico</label>
                        <input class="I2" type="text" id="DNI_Em_T" name="DNI_Em_T" placeholder="DNI" 
                               value=""readonly>
                        </form>
                        <button class="boton-opciones" id="btnAgregarTecnico"> Agregar Técnico
                               <i class="mdi mdi-keyboard-backspace"></i>
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
                            <?php
                                include_once 'models/etapa_contrato.php';
                                foreach ($this->etapa_contrato as $row) {
                                    $etapa_contrato = new Etapa_Contrato();
                                    $etapa_contrato = $row; ?>
                                    <tr>
                                        <td>
                                            <?php echo $etapa_contrato->IDContrato ?>
                                        </td>
                                        <td>
                                            <?php echo $etapa_contrato->IDEtapa ?>
                                        </td>
                                        <td>
                                            <?php echo $etapa_contrato->Fecha_Et ?>
                                        </td>
                                        <td>
                                            <?php echo $etapa_contrato->DNI_Em?>
                                        </td>
                                        <td>
                                        <button class="btn-small btn-primary" type="submit" name="accion" value="visualizar">
                                            <i class="mdi mdi-eye-settings mx-1"></i>
                                        </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <form action="<?php echo constant('URL'); ?>generarOrdenI/registrarOrden" name="formularioGOI" id="formularioGOI" method="POST">  
                   <button class="boton-opciones" id="btnGenerar"> Generar Orden 
                        <i class="mdi mdi-book-plus"></i></button>
                    </form>
                    <button class="boton-opciones" id="btnLimpiar"> Limpiar
                        <i class="mdi mdi-restore"></i></button>
                    <button class="boton-opciones" id="btnVolver"> Atras
                               <i class="mdi mdi-keyboard-backspace"></i>
                    </button>
                </div>
            </div>
        </div>
        <?php require_once "views/footer.php" ?>

    </div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?php echo constant('URL'); ?>public/js/generarOrdenI.js"></script>
</body>

</html>