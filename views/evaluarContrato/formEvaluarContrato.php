<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Evaluar Contrato</title>
    <link rel="stylesheet" href="public/css/formEvaluarContrato.css">
</head>

<body>
    <div class="evaluar-c">

        <?php require_once "views/header.php" ?>

        <div class="contenedor-principal">

            <div class="titulo">
                <h2 class="titulo-1">Evaluar </h2>
                <h2 class="titulo-2"> Contratos</h2>
            </div>

            <div class="search-container-1">

                <p class="subtitulo_1">Filtros de Contratos</p>

                <div class="caja_filtro_1">
                    <div class="subcajita">
                        <label class="label-styled" for="searchID">ID Contrato:</label>
                        <input type="text" class="input-field" id="searchID" placeholder="Buscar por ID">
                    </div>
                    <div class="subcajita">
                        <label class="label-styled" for="searchEstado">Seleccione un estado:</label>
                        <select class="input-field cbx" id="searchEstado" placeholder="Estados">
                            <option value="">En revisión</option>
                            <option value="">Observado</option>
                            <option value="">Aprobado</option>
                            <option value="">Desaprobado</option>
                            <!-- Opciones de estados se cargarán dinámicamente aquí -->
                        </select>
                    </div>
                    <div class="subcajita">
                        <label class="label-styled" for="searchFecha">Selecciona una fecha:</label><br>
                        <input type="date" id="searchFecha">
                    </div>
                </div>

            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>ID Contrato</th>
                            <th>Fecha Contrato</th>
                            <th>Número Radicado</th>
                            <th>Número Suministro</th>
                            <th>Punto Instalación</th>
                            <th>Estado</th>
                            <th>ID Gabinete Categoría</th>
                            <th>ID Tipo Instalación</th>
                            <th>DNI Cliente</th>
                            <th>DNI Empleado</th>
                            <th>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                include_once 'models/contrato.php';
                                foreach ($this->contrato as $row) {
                                    $contrato = new Contrato();
                                    $contrato = $row;?>
                            <td>
                                <?php echo $contrato->IDContrato ?>
                            </td>
                            <td>
                                <?php echo $contrato->Fecha_Con ?>
                            </td>
                            <td>
                                <?php echo $contrato->NumeroRadicado_Con ?>
                            </td>
                            <td>
                                <?php echo $contrato->numSum ?>
                            </td>
                            <td>
                                <?php echo $contrato->PuntoInstalacion_Con ?>
                            </td>
                            <td>
                                <?php echo $contrato->estado; ?>
                            </td>
                            <td>
                                <?php echo $contrato->IDGabineteCategoria; ?>
                            </td>
                            <td>
                                <?php echo $contrato->IDTipoInst; ?>
                            </td>
                            <td>
                                <?php echo $contrato->DNI_cli; ?>
                            </td>
                            <td>
                                <?php echo $contrato->DNI_Em; ?>
                            </td>
                            <td>
                                <button class="boton-opciones btn-selec" id="btn-seleccionar"
                                    data-id="<?php echo $contrato->IDContrato; ?>"
                                    data-nums="<?php echo $contrato->numSum; ?>"
                                    data-dni="<?php echo $contrato->DNI_cli; ?>"
                                    data-estado="<?php echo $contrato->estado; ?>">
                                    <i class="mdi mdi-content-copy"></i>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>

        <div class="contenedor-principal2">

            <form method="Post" action="<?php echo constant('URL'); ?>evaluarContrato" id="formularioEV">

            <div class="subcajita4">

                <div class="search-container-2">
                    <p class="subtitulo_1">Campos del contrato seleccionado</p>
                    <div class="caja_filtro_1">
                        <i class="mdi mdi-file-document i-t subcajita3"></i>
                        <div class="subcajita2" style="margin-left:-1px">
                            <label class="label-styled" for="IDContrato">ID Contrato:</label>
                            <input type="text" class="input-field2" id="IDContrato" placeholder="IDContrato" readonly>
                        </div>
                        <div class="subcajita2">
                            <label class="label-styled" for="numSum">Número de Suministro:</label>
                            <input type="text" class="input-field2" id="numSum" placeholder="Número de Suministro" readonly>
                        </div>
                        <div class="subcajita2">
                            <label class="label-styled" for="DNI_cli">DNI Cliente:</label>
                            <input type="text" class="input-field2" id="DNI_cli" placeholder="DNI del Cliente" readonly>
                        </div>
                        <div class="subcajita2">
                            <label class="label-styled" for="selectedEstado">Estado del Contrato:</label>
                            <select class="input-field2 cbx" id="selectedEstado">
                                <option value="">En revisión</option>
                                <option value="">Observado</option>
                                <option value="">Aprobado</option>
                                <option value="">Desaprobado</option>
                                <!-- Opciones del estado del contrato se cargarán dinámicamente aquí -->
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            </form>

            <div class="subcajita5">


            <div class="buttons-container">
                <button class="action-button" id="confirmar">Actualizar Estado<i class="mdi mdi-pencil ia"></i></button>
                <button class="action-button" id="limpiar">Limpiar Campos<i class="mdi mdi-restore ia"></i></button>
                <button class="action-button" id="volverMenu">Volver a Menú<i class="mdi mdi-keyboard-backspace ia"></i></button>
            </div>
            </div>

        </div>

        <div class="confirmation-dialog" id="dialogVisible">
            <!-- Contenido de la ventana de confirmación se generará dinámicamente aquí -->
        </div>

        <div class="error-dialog" id="dialogError">
            <!-- Contenido de la ventana de error se generará dinámicamente aquí -->
        </div>


        <?php require_once "views/footer.php" ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>public/js/evaluarContrato.js"></script>

</body>

</html>