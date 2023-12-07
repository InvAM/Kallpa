<?php

if (!isset($_SESSION["carrito"])) {
    header("location:main");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Carrito de Compras</title>
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <!-- Enlace a Bootstrap CSS -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Tu CSS personalizado (pegar esto en otro archivo si lo prefieres) -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/verCarrito.css" />
</head>

<body>
    <?php require_once "views/portalHeader.php"; ?>
    <div class="container1">
        <?php if (count($_SESSION["carrito"]) == 0): ?>
            <div class="tooltip-container">
                <span class="tooltip">Carrito Vacio</span>
                <span class="text">@</span>
            </div>
            <button class="btnCatalogo"><a href="catalogo">Ver Catálogo</a></button>
        <?php else: ?>
            <div class="tituloP">
            <label class="tituloProducto">Productos  <i class="mdi mdi-cart-arrow-down"></i></label>
            </div>
            <div class="card">
                <div>

                    <table class="tablaProductos">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre Producto<i></i></th>
                                <th>Cuota<i></i></th>
                                <th>Precio Regular<i></i></th>
                                <th>Precio a pagar<i></i></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($_SESSION["carrito"] as $fila): ?>
                                <tr>
                                    <td>
                                        <img src="data:image/jpeg;base64,<?php echo $fila["imagen"] ?>" class="imagenProducto">
                                    </td>
                                    <td class="nombreProducto">
                                        <?php echo $fila["nombre"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $fila["cuota"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $fila["precio1"]; ?>
                                    </td>
                                    <td>
                                        <?php echo $fila["precio2"]; ?>
                                    </td>
                                    <td><button class="btn btn-secondary btnEliminar"><i
                                                class="mdi mdi-delete iconoBorrar"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <a href="pagarProducto" class="btn btn-p">Pagar <i class="mdi mdi-cash"></i></a>

            <a href="catalogo" class="btn btn-p">Ver Catálogo <i class="mdi mdi-eye-check-outline"></i></a>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>public/js/carrito.js"></script>

</body>

</html>