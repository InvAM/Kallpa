<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Consultar Contrato</title>
    <link rel="stylesheet" href="public/css/formConsultarContrato.css">
</head>

<body>
    <div class="consultar-co">

        <?php require_once "views/header.php"; ?>

        <div class="contenedor-principal">

            <div class="titulo">
                <h2 class="titulo-1">Visualización de</h2>
                <h2 class="titulo-2">Consolidado de Contratos</h2>
            </div>

            <div class="parte-izq">
                <h3 class="subtitulo-lista">Contratos</h3>
                <div class="tabla">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DNI Cliente</th>
                                <th>DNI Empleado</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Número de Suministro</th>
                                <th>Seleccionar</th>
                                <th>Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>  
                                <?php
                                include_once 'models/contrato.php';
                                foreach ($this->contrato as $row) {
                                    $contrato = new Contrato();
                                    $contrato = $row;?>
                                    <tr>
                                        <td>
                                            <?php echo $contrato->IDContrato ?>
                                        </td>
                                        <td>
                                            <?php echo $contrato->DNI_cli ?>
                                        </td>
                                        <td>
                                            <?php echo $contrato->DNI_Em ?>
                                        </td>
                                        <td>
                                            <?php echo $contrato->estado ?>
                                        </td>
                                        <td>
                                            <?php echo $contrato->Fecha_Con?>
                                        </td>
                                        <td>
                                            <?php echo $contrato->numSum ?>
                                        </td>
                                        <td>
                                                <button class="boton-seleccionar boton" id="btnSeleccionar"
                                                        data-id="<?php echo $contrato->IDContrato; ?>"
                                                        data-fecha="<?php echo $contrato->Fecha_Con; ?>"
                                                        data-sum="<?php echo $contrato->numSum; ?>"
                                                        data-estado="<?php echo $contrato->estado; ?>"
                                                        data-radi="<?php echo $contrato->IDContrato; ?>">
                                                        <i class="mdi mdi-content-copy mx-1"></i>
                                                    </button>
                                        </td>
                                        <td>
                                                <button class="boton-seleccionar boton" id="btnVisualizar"
                                                        >
                                                        <i class="mdi mdi-eye-check-outline"></i>
                                                    </button>
                                        </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <div class="Acciones">
                <button class="boton-opciones1" id="btnLimpiar">
                     Limpiar<i class="mdi mdi-restore"></i>
                </button>
                <button class="boton-opciones1" id="btnAtras">
                    Atras
                        <i class="mdi mdi-keyboard-backspace"></i>
                </button>
                <button class="boton-opciones" id="btnOrdenI">
                    Orden de Instalación <i class="mdi mdi-skip-next-circle"></i>
                </button>
                <button class="boton-opciones">
                    Orden de Habilitación <i class="mdi mdi-skip-next-circle"></i>
                </button>
                </div>
                </div>
            </div>



            <div class="contenedor-info">
                <form method="Post" action="<?php echo constant('URL'); ?>consultarContrato" id="formularioVC">
                <h3 class="subtitulo-lista">Datos del Contrato</h3>
                <div class="contenedor">
                    <i class="mdi mdi-text-box-search-outline"></i>
                    <p>IdContrato</p>
                    <input type="text" id="IDContrato_VC" name="IDContrato_VC" placeholder="ID Contrato" readonly>
                    <p>Fecha</p>
                    <input type="text" id="Fecha_VC" name="Fecha_VC" placeholder="Fecha" readonly>
                    <p>Número de Suministro</p>
                    <input type="text" id="NumerodeSuministro_VC"  name="NumerodeSuministro_VC" placeholder="N° Suministro" readonly>
                    <p>Estado</p>
                    <input type="text" id="Estado_VC" name="Estado_VC" placeholder="Estado" readonly>
                    <p>Número de Radicando</p>
                    <input type="text" id="NumerodeRadicado_VC" name="NumerodeRadicado_VC" placeholder="N° Radicando" readonly>
                </div>
            </div>
        </div>

        <?php require_once "views/footer.php"; ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>public/js/consultarContrato.js"></script>

</body>

</html>