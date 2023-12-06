<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Generar Orden Habilitación</title>
    <link rel="stylesheet" href="public/css/formGenerarOrdenH.css">
</head>

<body>
    <div class="generar-OH">
        <?php require_once "views/header.php"; ?>

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
                    <p class="tituloS2">Especificaciones de Orden</p>
                    <div class="cajaOrdenH">

                        <div class="subcajita">
                            <label class="Sub">Número de Orden</label><br>
                            <input type="text" label="numOrden" id="numOrden_G" name="numOrden_G"
                                placeholder="Número de Orden">
                        </div>
                        <div class="subcajita">
                            <label class="Sub">Etapa</label><br>
                            <select name="selectedEtapa" id="selectedEtapa">
                                <option value="1">Instalación</option>
                                <option value="2">Habilitación</option>
                            </select>
                        </div>
                        <div class="subcajita">
                            <label class="Sub">ID Etapa</label><br>
                            <input type="text" label="idEtapa" placeholder="ID Etapa" name="IDEtapa_G" id="IDEtapa_G"
                                value="2" readonly>
                        </div>
                        <div class="subcajita">
                            <label class="Sub">ID de Contrato</label><br>
                            <input type="text" label="idContrato" placeholder="ID Contrato" id="IDContrato_G"
                                name="IDContrato_G" readonly>
                        </div>
                        <div class="subcajita">
                            <label class="Sub">Número de Suministro</label><br>
                            <input type="text" label="numS" placeholder="Número de Suministro" id="NumS_G" name="NumS_G"
                                readonly>
                        </div>

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
                    <div class="CajaHabilitador">
                        <p class="TI2">Datos del Habilitador</p>

                        <label class="Sub" for="NombreCompleto_Em">Habilitador</label><br>
                        <input class="I2" type="text" id="NombreCompleto_Em" name="NombreCompleto_Em"
                            placeholder="Habilitador" value="" readonly>
                        <label class="Sub" for="DNI_Em_H">Dni del Habilitador</label><br>
                        <input class="I2" type="text" id="DNI_Em_H" name="DNI_Em_H" placeholder="DNI" value="" readonly>

                        <button class="boton" id="btnAgregarHabilitador">
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

                                    <th>Agregar Materiales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once 'models/etapacontrato.php';
                                foreach($this->etapa_contrato as $row) {
                                    $etapa_contrato = new EtapaContrato();
                                    $etapa_contrato = $row; ?>
                                    <tr>
                                        <td>
                                            <?php echo $etapa_contrato->IDEtapa ?>
                                        </td>
                                        <td>
                                            <?php echo $etapa_contrato->IDContrato ?>
                                        </td>
                                        <td>
                                            <?php echo $etapa_contrato->Fecha_Et ?>
                                        </td>
                                        <td>
                                            <?php echo $etapa_contrato->DNI_Em ?>
                                        </td>

                                        <td>
                                            <button class="btn-small btn-primary" id="btnAsignarMateriales"
                                                data-idcontrato="<?php echo $etapa_contrato->IDContrato; ?>"
                                                data-idetapa="<?php echo $etapa_contrato->IDEtapa; ?>"
                                                data-fecha="<?php echo $etapa_contrato->Fecha_Et; ?>"
                                                data-dniE="<?php echo $etapa_contrato->DNI_Em; ?>">
                                                <i class="mdi mdi-list-box"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <button class="boton-opciones-H" id="btnGenerar"> Generar Orden
                        <i class="mdi mdi-book-plus"></i></button>

                    <button class="boton-opciones-H" id="btnLimpiar"> Limpiar
                        <i class="mdi mdi-restore"></i></button>
                    <button class="boton-opciones-H" id="btnVolver"> Atras
                        <i class="mdi mdi-keyboard-backspace"></i>
                    </button>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>

        <?php require_once "views/footer.php"; ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>public/js/generarOrdenH.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>