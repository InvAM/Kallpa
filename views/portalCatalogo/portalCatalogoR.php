<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/portalCatalogo.css">
    </head>
    <body>
    <?php
        echo '<div class="central">';
        include_once 'models/producto.php';
        foreach ($this->productos as $fila) {

            $producto = new Producto();
            $producto = $fila;
            echo '<div class="producto">';
            if (!empty($producto->imagen)) {
                $imagen_base64 = base64_encode($producto->imagen);
                $imagen_src = "data:image/jpeg;base64," . $imagen_base64;
                echo '<img class="imagen" src="' . $imagen_src . '">';
            } else {
                echo '<img class="imagen" src="../../IMG/Kallpa1.png">';
            }
            echo '<div class="descripcion">';
            echo '<span name="nombre" class="nombre">' . $producto->nombre . '</span><br><br>';
            echo '<span name="detalle" class="detalle">' . $producto->detalleMarcaP . '</span><br><br><br>';
            echo '<span class="letra">' . 'Desde ' . '<span>';
            echo '<span>S/.</span><span class="letra1" name="cuota">' . $producto->cuota . '</span>';
            echo '<span class="letra">' . ' al mes ' . '<span><br><br>';
            echo '<span class="letra">Precio Regular: S/.</span><span class="letra" name="precio1">' . $producto->precio . '</span><br><br>';
            echo '<span class="letra2">Tienda Virtual: S/.</span><span name="precio2" class="letra2">' . (0.95 * $producto->precio) . '</span><br><br>';
            echo '<button class="boton-compra comprar-btn">
                    <i class="mdi mdi-cart-percent"></i>
                        ¡Compra Ya!
                </button>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        ?>
    </body>   
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>public/js/catalogo.js"></script>
</html>