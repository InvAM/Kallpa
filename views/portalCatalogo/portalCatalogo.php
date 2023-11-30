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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <div class="select-selected">Recientes
                        <i class="mdi mdi-arrow-down-drop-circle"></i>
                    </div>
                    <ul class="select-items">
                        <li class="items"><a href=""><span>Recientes</span></a></li>
                        <li class="items"><a href=""><span>De mayor a menor precio</span></a></li>
                        <li class="items"><a href=""><span>De menor a mayor precio</span></a></li>
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
                            <input type="checkbox" id="item2" name="item2">
                            <label for="item2">Cocinas</label>
                        </li>
                        <li>
                            <input type="checkbox" id="item3" name="item3">
                            <label for="item3">Estufas</label>
                        </li>
                        <li>
                            <input type="checkbox" id="item1" name="item1">
                            <label for="item1">Secadoras</label>
                        </li>
                        <li>
                            <input type="checkbox" id="item4" name="item4">
                            <label for="item4">Termas</label>
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
                            <input type="checkbox" id="itemA" name="itemA">
                            <label for="itemA">AQUAMAXX</label>
                        </li>
                        <li>
                            <input type="checkbox" id="itemB" name="itemB">
                            <label for="itemB">HOLI</label>
                        </li>
                        <li>
                            <input type="checkbox" id="itemC" name="itemC">
                            <label for="itemC">MABE</label>
                        </li>
                        <li>
                            <input type="checkbox" id="itemD" name="itemD">
                            <label for="itemD">ROTOPLAS</label>
                        </li>
                        <li>
                            <input type="checkbox" id="itemE" name="itemE">
                            <label for="itemE">SOLE</label>
                        </li>
                        <li>
                            <input type="checkbox" id="itemF" name="itemF">
                            <label for="itemF">SGA</label>
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
                            <script>
                                const minPrecioInput = document.getElementById("min-precio");
                                const maxPrecioInput = document.getElementById("max-precio");
                                const minValorSpan = document.getElementById("min-valor");
                                const maxValorSpan = document.getElementById("max-valor");

                                minPrecioInput.addEventListener("input", function () {
                                    minValorSpan.textContent = this.value;
                                });

                                maxPrecioInput.addEventListener("input", function () {
                                    maxValorSpan.textContent = this.value;
                                });
                            </script>
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
                    foreach ($this->producto as $fila) {

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
                        echo '<span name="detalle" class="nombre">' . $producto->detalleMarcaP . '</span><br><br><br>';
                        echo '<span class="letra">' . 'Desde ' . '<span>';
                        echo '<span class="letra1">' . 'S/.' . $producto->cuota . '*' . '</span>';
                        echo '<span class="letra">' . ' al mes ' . '<span><br><br>';
                        echo '<span class="letra">' . 'Precio Regular: S/.' . $producto->precio . '</span><br><br>';
                        echo '<span name="precio" class="letra2">' . 'Tienda Virtual: S/.' . (0.95 * $producto->precio) . '</span><br><br>';
                        echo '<button class="boton-compra">
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

</body>

</html>