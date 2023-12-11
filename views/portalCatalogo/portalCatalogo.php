<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/portalCatalogo.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/css/splide-core.min.css">
    <link rel="icon" href="<?php echo constant('URL'); ?>public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Catalogo de Productos</title>
    <script src="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <!-- CABECERA -->
    <?php require_once "views/portalHeader.php"; ?><!-- LAYER -->

    <div class="container">
        <div class="splide">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide"><img src="<?php echo constant('URL') ?>public/Img/CAT-layer2.png" /></li>
                    <li class="splide__slide"><img src="<?php echo constant('URL') ?>public/Img/CAT-layer1.png"
                            alt="" />
                    </li>
                    <li class="splide__slide"><img src="<?php echo constant('URL') ?>public/Img/CAT-layer3.png"
                            alt="" />
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Layer Script-->
    <script>
        new Splide('.splide', {
            type: 'loop',
            autoplay: true,
            interval: '3000',
            pagination: false,
        }).mount();
    </script>

    <!-- Cuerpo de pagina-->
    <div class="contenedorCatalogo">
        <!-- OPCIONES DE MANEJADOR -->
        <div class="opcionesA1">
            <a href="<?php echo constant('URL'); ?>catalogo">
                <button class="botonA1">GASODOMÉSTICOS</button>
            </a>
            <a href="<?php echo constant('URL'); ?>catalogoservicios">
                <button class="botonB1">SERVICIOS</button>
            </a>
            <div class="filtrado">
                <label class="labelSelect">Ordena Por : </label>
                <div class="select">
                    <div class="select-selected">Precios
                        <i class="mdi mdi-arrow-down-drop-circle"></i>
                    </div>
                    <ul class="select-items">
                        <li class="items" id="todos"><a href="#"><span>Todos los precios</span></a></li>
                        <li class="items" id="mayor-menor"><a href=""><span>De mayor a menor precio</span></a></li>
                        <li class="items" id="menor-mayor" ><a href=""><span>De menor a mayor precio</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!----Listado de productos--->
        <div class="contenedorlistas">
            <div class="CajasFiltros">
                <div class="Filtro1">
                    <label class="titulocate">SUB CATEGORÍA </label>
                    <ul class="checklist">
                        <li>
                            <input type="checkbox" id="Cocinas" name="Cocinas">
                            <label for="Cocinas">Cocinas</label>
                        </li>
                        <li>
                            <input type="checkbox" id="Estufas" name="Estufas">
                            <label for="Estufas">Estufas</label>
                        </li>
                        <li>
                            <input type="checkbox" id="Secadoras" name="Secadoras">
                            <label for="Secadoras">Secadoras</label>
                        </li>
                        <li>
                            <input type="checkbox" id="Termas" name="Termas">
                            <label for="Termas">Termas</label>
                        </li>
                        <li>
                            <input type="checkbox" id="item5" name="item5">
                            <label for="item5">Combos</label>
                        </li>
                    </ul>
                </div>
                <hr class="divisor">
                </hr>
                <div class="Filtro2">
                    <label class="titulocate">MARCA</label>
                    <ul class="checklist">
                        <li>
                            <input type="checkbox" id="AGHASO" name="AGHASO" value="AGHASO">
                            <label for="AGHASO">AGHASO</label>
                        </li>
                        <li>
                            <input type="checkbox" id="AQUAMAXX" name="AQUAMAXX" value="AQUAMAX">
                            <label for="AQUAMAXX">AQUAMAXX</label>
                        </li>
                        <li>
                            <input type="checkbox" id="HOLI" name="HOLI" value="HOLI">
                            <label for="HOLI">HOLI</label>
                        </li>
                        <li>
                            <input type="checkbox" id="MABE" name="MABE"  value="MABE">
                            <label for="MABE">MABE</label>
                        </li>
                        <li>
                            <input type="checkbox" id="itemD" name="itemD"  value="ROTOPLAS">
                            <label for="itemD">ROTOPLAS</label>
                        </li>
                        <li>
                            <input type="checkbox" id="SOLE" name="SOLE"  value="SOLE">
                            <label for="SOLE">SOLE</label>
                        </li>
                        <li>
                            <input type="checkbox" id="SGA" name="SGA" value="SGA">
                            <label for="SGA">SGA</label>
                        </li>
                    </ul>
                </div>
                <hr class="divisor">
                </hr>
                <div class="filtro3">
                    <label class="titulocate">PRECIOS</label>
                    <br>
                    <br>
                    <br>
                    <label class="rangoP" for="min-precio">Mínimo</label>
                    <br>
                    <input type="range" id="min-precio" name="min-precio" min="0" max="5000" step="10" value="0">
                    <span id="min-valor">0 </span><span>Soles<span>
                            <br>
                            <br>
                            <label class="rangoP" for="max-precio">Máximo </label>
                            <br>
                            <input type="range" id="max-precio" name="max-precio" min="0" max="5000" step="10"
                                value="5000">
                            <span id="max-valor">5000 </span><span>Soles</span>
                            <br>
                            <br>
                            <hr class="divisor">
                            </hr>
                </div>
            </div>
            <!--Llenado de Caja-->
            <div class="lista">
            <fieldset class="cajaCentral">
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
                            echo '<img class="imagen" src="' . $imagen_src . '" data-imagen="' . $imagen_base64 . '">';
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
                </fieldset>
            </div>
        </div>
    </div>
    <?php require_once "views/chatbot.php"; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>public/js/catalogo.js"></script>
</body>

</html>