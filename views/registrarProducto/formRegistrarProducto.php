<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registrar Producto</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/formRegistrarProducto.css">
    <!-- Incluye tus estilos adicionales si es necesario -->
</head>

<body>
    <div class="registra_produ">
        <?php require_once "views/header.php"; ?>

        <div class="contenedor-principal">
            <div class="titulo">
                <h2 class="titulo-1">Registro de</h2>
                <h2 class="titulo-2">Productos</h2>
            </div>
            <div class="caja-empleado">
                <div class="contenedor-empleado">
                    <form action="<?php echo constant('URL'); ?>registrarProducto/registrarNuevoProducto" method="POST" enctype="multipart/form-data">
                        <div class="fila">
                            <div class="input-group">
                                <label class="subtitulo-empleados" for="product-code">Código del Producto:</label>
                                <input type="text" id="product-code" placeholder="Ingrese Código..." name="product-code" required>
                            </div>

                            <div class="input-group">
                                <label class="subtitulo-empleados" for="product-name">Nombre del Producto:</label>
                                <input type="text" id="product-name" placeholder="Ingrese Nombre del Producto..." name="product-name" required>
                            </div>
                        </div>

                        <div class="fila">
                            <div class="input-group">
                                <label for="product-price">Precio del Producto:</label>
                                <input type="text" id="product-price" placeholder="Ingrese Precio..." name="product-price" required>
                            </div>

                            <div class="input-group">
                                <label for="product-cuota">Cuota del Producto:</label>
                                <input type="text" id="product-cuota" placeholder="Ingrese Cuota..." name="product-cuota" required>
                            </div>
                        </div>

                        <div class="fila">
                            <div class="input-group">
                                <label for="product-categoria">Categoria del Producto:</label>
                                <input type="text" id="product-categoria" placeholder="Seleccione Categoria..." name="product-categoria" required>
                            </div>

                            <div class="input-group">
                                <label for="product-marca">Marca del Producto:</label>
                                <input type="text" id="product-marca" placeholder="Seleccione Marca..." name="product-marca" required>
                            </div>
                        </div>

                                            <div class="fila">
                            <div class="input-group">
                                <label for="product-image">Imagen del Producto:</label>
                                <div class="file-container">
                                    <input type="file" id="file-upload" name="product-image" onchange="previewImage(this)">
                                    <div class="image-container">
                                        <img class="image-preview" id="modal-image">
                                    </div>
                                </div>
                                <a href="#" id="preview-link" style="display: none;" onclick="openModal()"></a>
                            </div>
                        </div>

                        <div class="actions">
                            <button type="submit">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="parte-derecha">
                <h3 class="subtitulo-lista">Lista de Productos</h3>
                <div class="table-container">
                    <table id="product-table">
                        <thead>
                            <tr>
                                <th>ID_Producto</th>
                                <th>Nombre del Producto</th>
                                <th>Precio</th>
                                <th>Cuota</th>
                                <th>Categoria</th>
                                <th>Marca</th>
                                <th>Visualizar</th>
                                <th>Seleccionar</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <!-- Aquí puedes mostrar los productos existentes si es necesario -->
                    </table>
                </div>
            </div>
            <a href="menu"><button class="boton-opciones">Atras</button></a>

            <?php require_once "views/footer.php"; ?>

        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="<?php echo constant('URL'); ?>public/js/registraProductos.js"></script>
        <!-- Incluye tus scripts adicionales si es necesario -->
    </body>
</html>
