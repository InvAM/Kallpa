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
    <!-- Enlace a Bootstrap CSS -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Tu CSS personalizado (pegar esto en otro archivo si lo prefieres) -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/verCarrito.css" />
</head>

<body>
    <?php require_once "views/portalHeader.php"; ?>
    <div class="container">
        <?php if (count($_SESSION["carrito"]) == 0): ?>
            <p>Carrito Vacío</p>
            <a href="catalogo" class="btn btn-primary">Ver Catálogo</a>
        <?php else: ?>
            <h3 class="tituloProducto">Productos</h3>

            <div class="card">
                <div>

                    <table class="tablaProductos">
                        <thead>
                            <tr>
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
                                    <td><button href="#" class="btn btn-secondary"><i
                                                class="mdi mdi-delete iconoBorrar"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>


            <a href="pagarProducto" class="btn btn-p">Pagar</a>

            <a href="catalogo" class="btn btn-p">Ver Catálogo</a>
        <?php endif; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>

</html>