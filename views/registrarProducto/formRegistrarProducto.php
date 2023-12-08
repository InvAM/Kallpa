<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <title>Registrar Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/formRegistrarProducto.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.all.min.js"></script>
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
            <h3 class="subtitulo-lista">Datos Generales</h3>
                <div class="contenedor-empleado">
                    <form id="formProducto" method="POST" enctype="multipart/form-data">
                        <div class="fila">
                            <div class="input-group">
                                <label class="subtitulo-empleados" for="IDProducto">Código del Producto:</label>
                                <input type="text" id="IDProducto" placeholder="Ingrese Código..." name="IDProducto"
                                    required>
                            </div>

                            <div class="input-group">
                                <label class="subtitulo-empleados" for="nombre">Nombre del Producto:</label>
                                <input type="text" id="nombre" placeholder="Ingrese Nombre del Producto..."
                                    name="nombre" required>
                            </div>
                        </div>

                        <div class="fila">
                            <div class="input-group">
                                <label for="precio">Precio del Producto:</label>
                                <input type="text" id="precio" placeholder="Ingrese Precio..." name="precio" required>
                            </div>

                            <div class="input-group">
                                <label for="cuota">Cuota del Producto:</label>
                                <input type="text" id="cuota" placeholder="Ingrese Cuota..." name="cuota" required>
                            </div>
                        </div>

                        <div class="fila">
                            <div class="input-group">
                                <label for="IDCategoriaP">Categoria del Producto:</label>
                                <select name="IDCategoriaP" id="IDCategoriaP">
                                    <?php
                                    include_once 'models/categoria_producto.php';
                                    foreach ($this->categorias as $opcion) {
                                        $categorias = new CategoriaProducto();
                                        $categorias = $opcion; ?>
                                        <option value="<?php echo $opcion->IDCategoriaP; ?>">
                                            <?php echo $opcion->detalleCategoriaP; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="input-group">
                                <label for="IDMarcaP">Marca del Producto:</label>
                                <select name="IDMarcaP" id="IDMarcaP">
                                    <?php
                                    include_once 'models/marca_producto.php';
                                    foreach ($this->marcas as $opcion) {
                                        $marcas = new MarcaProducto();
                                        $marcas = $opcion; ?>
                                        <option value="<?php echo $opcion->IDMarcaP; ?>">
                                            <?php echo $opcion->detalleMarcaP; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="fila">
                            <div class="input-group">
                                <label for="imagen">Imagen del Producto:</label>
                                <div class="file-container">
                                    <input type="file" id="file-upload" name="imagen" onchange="previewImage(this)">
                                    <div class="image-container">
                                        <img class="image-preview" id="modal-image">
                                    </div>
                                </div>
                                <a href="#" id="preview-link" style="display: none;"></a>
                            </div>
                        </div>

                        <div class="actions">
                            <button type="submit" id="btnRegistrar">Registrar</button>
                            <button id="btnActualizar" type="submit">Actualizar</button>

                        </div>
                    </form>
                </div>
            </div>
            <div class="parte-derecha">
                <div><h3 class="subtitulo-lista">Lista de Productos</h3></div>
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
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php  
                        include_once 'models/producto.php';
                        include_once 'models/categoria_producto.php';
                        include_once 'models/marca_producto.php';
                        foreach ($this->productos as $row){
                            $producto = new Producto();
                            $producto = $row; ?>
                            <tr>
                                <td class="idproductoColumn" ><?php echo $producto->IDProducto; ?></td>
                                <td><?php echo $producto->nombre; ?></td>
                                <td><?php echo $producto->precio; ?></td>
                                <td><?php echo $producto->cuota; ?></td>
                                <td><?php echo $producto->detalleCategoriaP;
                                $IDcat=$producto->IDCategoriaP ?></td>
                                <td><?php echo $producto->detalleMarcaP;
                                $IDma=$producto->IDMarcaP; 
                                $imagen=$producto->imagen;?></td>
                                
                                <td><button id="btnVisualizar" class="btnVisualizar" ><i class="mdi  mdi-message-image"></i> </button></td>
                                <td> 
                                <button class="seleccionar-btn"
                                data-idproducto="<?php echo $producto->IDProducto; ?>"
                                data-nombre="<?php echo $producto->nombre; ?>"
                                data-precio="<?php echo $producto->precio; ?>"
                                data-cuota="<?php echo $producto->cuota; ?>"
                                data-categoria="<?php echo $IDcat; ?>"
                                data-marca="<?php echo $IDma; ?>"
                                data-imagen="<?php echo base64_encode($imagen); ?>" >
                                <i class="mdi mdi-content-copy mx-1"></i>
                            </button></td>
                            <td>
                                        <button id="btnEliminar" class="btnEliminar"><i  class="mdi mdi-delete-forever"></i></button>
                                    </td>
                            </tr>
                        <?php } ?>
                    </tbody>                    
                    </table>
                </div>
            </div>
            <div class= "mover">
            <div>
                <a href="menu"><button class="boton-opciones">Atras <i class="mdi mdi-keyboard-backspace"></i></button></a>
                            </div>
            <?php require_once "views/footer.php"; ?>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="<?php echo constant('URL'); ?>public/js/registraProductos.js"></script>
        <!-- Incluye tus scripts adicionales si es necesario -->
</body>

</html>