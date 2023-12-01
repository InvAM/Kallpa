<?php

if (!isset($_SESSION["carrito"])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Carrito de Compras</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tu CSS personalizado (pegar esto en otro archivo si lo prefieres) -->
    <link rel="stylesheet" href="verCarrito.css" />
</head>

<body>

    <div class="container">
        <h2>Bienvenido
            <?php echo $_SESSION["nombrecliente"] ?>
        </h2>

        <a href="cerrarSesionC" class="btn btn-danger">Cerrar Sesión</a>

        <?php if (count($_SESSION["carrito"]) == 0): ?>
            <p>Carrito Vacío</p>
            <a href="catalogo" class="btn btn-primary">Ver Catálogo</a>
        <?php else: ?>
            <?php foreach ($_SESSION["carrito"] as $fila): ?>
                <div class="card">
                    <div class="card-body">
                        <p>Nombre Producto:
                            <?php echo $fila["nombre"]; ?>
                        </p>
                        <p>Cuota:
                            <?php echo $fila["cuota"]; ?>
                        </p>
                        <p>Precio anterior:
                            <?php echo $fila["precio1"]; ?>
                        </p>
                        <p>Precio a cancelar:
                            <?php echo $fila["precio2"]; ?>
                        </p>
                        <a href="#" class="btn btn-secondary">Borrar</a>
                    </div>
                </div>
            <?php endforeach; ?>
            <a href="catalogo" class="btn btn-primary">Ver Catálogo</a>
        <?php endif; ?>
    </div>

    <!-- Enlace a Bootstrap JS y jQuery (necesarios para algunas funciones de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>