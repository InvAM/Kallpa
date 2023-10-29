<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/defaultPortal.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/css/splide-core.min.css">
    <script src="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/js/splide.min.js"></script>
</head>

<body>

    <header class="cabeceras">
        <div class="numeros">
            <div class="contenedor1 lineacont">
                <span class="label">Aló Kallpa</span>
                <a id="linea2" href="tel:+5116354338" class="numeroT">635 4338</a>
            </div>
            <div class="contenedor1 lineacont">
                <span class="label">Línea de Contacto</span>
                <a id="linea1" href="" class="numeroT">1111</a>
            </div>
            <a href="https://wa.me/51941301020" target="_blank" class="contenedor1">
                <span class="label">
                    <i class="mdi mdi-whatsapp"></i><span> WhatsApp</span>
                </span>
                <span class="numeroT">941 301 020</span>
            </a>
        </div>
        <nav class="menuOpciones">
            <div id="menu" class="navegacion">
                <ul class="lista-menu">
                    <li class="logo-kallpa">
                        <a href="main">
                            <img src="public/Img/Kallpa1.png">
                        </a>
                    </li>
                    <li class="menu-item">
                        <div class="item-label-icon" data-toggle="collapse" href="" role="button" aria-expanded="false"
                            aria-controls="submenu1">
                            <i class="mdi mdi-home-assistant"></i>
                            <a href="infoKallpa" class="menu-link">InfoKallpa</a>
                        </div>
                        <div id="submenu2" class="submenuContenedor contenedor-menu collapse">
                            <ul class="row">
                                <li class="col"><a href=""><i class="mdi mdi-book-edit-outline"></i><span>Nuestra
                                            Historia</span></a></li>
                                <li class="col"><a href="miyvi"><i class="mdi mdi-eye-outline"></i><span>Visión y
                                            misión</span></a></li>
                            </ul>
                        </div>
                    </li>


                    <li class="menu-item">
                        <div class="item-label-icon" data-toggle="collapse" href="" role="button" aria-expanded="false"
                            aria-controls="submenu2">
                            <i class="mdi mdi-home-heart"></i>
                            <a href="" class="menu-link"> Hogar</a>
                        </div>
                    </li>

                    <li class="menu-item">
                        <div class="item-label-icon" data-toggle="collapse" href="#submenu2" role="button"
                            aria-expanded="false" aria-controls="submenu2">
                            <i class="mdi mdi-palette-swatch-variant"></i>
                            <a href="" class="menu-link">Catalogo Virtual</a>
                        </div>
                        <div id="submenu2" class="submenuContenedor contenedor-menu collapse">
                            <ul class="row">
                                <li class="col"><a href=""><i
                                            class="mdi mdi-account-wrench"></i><span>Servicios</span></a></li>
                                <li class="col"><a href=""><i
                                            class="mdi mdi-air-humidifier"></i><span>Gasodomésticos</span></a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="menu-item">
                        <div class="item-label-icon" data-toggle="collapse" href="" role="button" aria-expanded="false"
                            aria-controls="submenu3">
                            <i class="mdi mdi-face-agent"></i>
                            <a href="" class="menu-link">Atención al cliente</a>
                        </div>
                        <div id="submenu2" class="submenuContenedor contenedor-menu collapse">
                            <ul class="row">
                                <li class="col1"><a href=""><i class="mdi mdi-help"></i><span>Preguntas
                                            frecuentes</span></a></li>
                                <li class="col1"><a href=""><i class="mdi mdi-archive-check-outline"></i><span>Buzón
                                            de sugerencias</span></a></li>
                                <li class="col1"><a href=""><i class="mdi mdi-notebook-check-outline"></i><span>Libro de
                                            reclamaciones</span></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

</body>

</html>