<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Asignar Materiales</title>
    <link rel="stylesheet" href="public/css/formRegistrarMateriales.css">
</head>

<body>
    <div class="registrar-M">
        <?php require_once "views/header.php"; ?>
        <!--- --------------------------------------------------------------------------------------->
        <div class="contenedorP">
            <div class="tituloP">
                <h2 class="titulo-A">Registrar</h2>
                <h2 class="titulo-B">Materiales</h2>
            </div>
            <div class="contenedorS">
                <div class="cajaContrato">
                    <p class="tituloS2">Especificaciones de contrato</p>
                    <div class="cajaContratoP">
                        <div class="subcajita">
                            <label>ID Contrato<label><br>
                                    <input type="text" label="idContrato" id="IDContrato_M" name="IDContrato_M"
                                        placeholder="ID Contrato">
                        </div>
                        <div class="subcajita">
                            <label>Fecha Orden<label><br>
                                    <input type="text" label="fecha" id="Fecha_O" name="Fecha_O"
                                        placeholder="Fecha de Orden">
                        </div>
                        <div class="subcajita">
                            <label>ID Etapa<label><br>
                                    <input type="text" label="idEtapa" id="IDEtapa_M" name="IDEtapa_M"
                                        placeholder="ID Etapa">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-------------------------------------------------------------------------------------->
        <div class="ContenedorP1">
            <div class="CajaMaterial">
                <p><Strong>Registrar Materiales</Strong></p>
                <label>Material<label>
                        <select id="materialSelect">
                            <?php
                            include_once 'models/material.php';
                            foreach ($this->material as $opcion) {
                                $material = new Material();
                                $material = $opcion; ?>
                                <option value="<?php echo $opcion->Nombre_Ma; ?>">
                                    <?php echo $opcion->Nombre_Ma; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label>Cantidad<label>
                                <input class="n1" type="number" name="Cantidad_Ma" id="Cantidad_Ma" label="cantidad"
                                    placeholder="Cantidad">
                                <button class="boton" id="btnAgregar">
                                    Añadir
                                    <i class="mdi mdi-plus"></i>
                                </button>
                                <button class="boton" id="btnActualizar">
                                    Actualizar
                                    <i class="mdi mdi-pencil"></i>
                                </button>
            </div>
            <div class="CajaTabla">
                <p><strong>Detalle Materiales</strong></p>
                <form action="<?php echo constant('URL'); ?>registrarMateriales/registrarMateriales"
                    class="formularioRM" name="formularioRM" id="formularioRM" method="POST">
                    <div class="tabla">
                        <table id="tablaMateriales" class="custom-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Material</th>
                                    <th>Cantidad</th>
                                    <th>Seleccionar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button class="boton-opciones" id="btnAsignarMaterialesBD"> Asignar Materiales
                        <i class="mdi mdi-book-plus"></i></button>
                        <button class="boton-opciones" id="btnLimpiar"> Limpiar Lista
                    <i class="mdi mdi-restore"></i></button>
                <button class="boton-opciones" id="btnAtras"> Atras
                    <i class="mdi mdi-keyboard-backspace"></i></button>
                </form>
                

            </div>
        </div>
        <?php require_once "views/footer.php"; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>public/js/registrarMaterial.js"></script>

</body>

</html>