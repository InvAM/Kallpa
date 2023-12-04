<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registrar Material</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/formRegistrarMate.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="registra_materiales">
        <?php require_once "views/header.php"; ?>

        <div class="titulo">
            <h2 class="titulo-1">Registrar de</h2>
            <h2 class="titulo-2">Materiales</h2>
        </div>

        <div class="contenedor-principal">
            <div class="form-container">
                <h3 class="subtitulo-empleado">Datos Generales</h3>

                <div class="caja-material">
                    <img src="<?php echo constant('URL'); ?>public/Img/materias-primas.png" class="imagen-foto">
                    <div class="contenedor-material">
                        <form id="formMaterial" method="POST" enctype="multipart/form-data">
                            <div class="fila">
                                <div class="input-group">
                                    <label class="subtitulo-materiales" for="idmateriales">Código de Material:</label>
                                    <input type="text" id="idmateriales" placeholder="Ingrese Código..."
                                        name="idmateriales" required>
                                </div>

                                <div class="input-group">
                                    <label class="subtitulo-materiales" for="nombre_materiales">Nombre del Material:</label>
                                    <input type="text" id="nombre_materiales" placeholder="Ingrese Nombre del Material..."
                                        name="nombre_materiales" required>
                                </div>
                            </div>

                            <div class="fila">
                                <div class="input-group">
                                    <label for="Unidad_Ma">Unidad de mediad </label>
                                    <input type="text" id="Unidad_Ma" placeholder="Ingrese Precio..."
                                        name="Unidad_Ma"  required>
                                </div>

                                <div class="input-group">
                                    <label for="stock_materiales">Stock del Material:</label>
                                    <input type="number" id="stock_materiales" placeholder="Ingrese Stock..."
                                        name="stock_materiales" min="0" required>
                                </div>
                            </div>

                            <div class="actions">
                                <button type="button" id="btnRegistrarMaterial">Registrar</button>
                                <button type="button" class="boton" id="btnActualizarMaterial">Actualizar</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="parte-derecha">
                <h3 class="subtitulo-lista">Materiales Registrados</h3>
                <div class="table-container">
                    <table id="material-table">
                        <thead>
                            <tr>
                                <th>Código de Material</th>
                                <th>Nombre del Material</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Seleccionar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                                            <tbody>
                                                
                        <?php 
                        foreach ($this->materiales as $material) : ?>
                            <tr>
                                <td class="idmaterialColumn"><?php echo $material->IDMaterial; ?></td>
                                <td><?php echo $material->Nombre_Ma; ?></td>
                                <td><?php echo $material->UnidadMedida_Ma; ?></td>
                                <td><?php echo $material->Stock_Ma; ?></td>
                                <!-- Agrega otras columnas según tus datos -->
                                <td>
                                    <button class="seleccionar-btn"
                                            data-idmateriales="<?php echo $material->IDMaterial; ?>"
                                            data-nombre_materiales="<?php echo $material->Nombre_Ma; ?>"
                                            data-Unidad_Ma="<?php echo $material->UnidadMedida_Ma; ?>"
                                            data-stock_materiales="<?php echo $material->Stock_Ma; ?>">
                                        <i class="mdi mdi-content-copy mx-1"></i>
                                    </button>
                                    <td><button id="btnEliminar" class="btnEliminar"><i  class="mdi mdi-delete-forever"></i></button></td>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
                <a href="menu"><button class="boton-opciones">Atras</button></a>
            </div>
        </div>

        <?php require_once "views/footer.php"; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>public/js/registrarMate.js"></script>
    <!-- Incluye tus scripts adicionales si es necesario -->
</body>

</html>
