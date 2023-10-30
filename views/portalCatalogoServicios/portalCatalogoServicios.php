<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/portalCatalogoServicios.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/css/splide-core.min.css">
    <link rel="icon" href="<?php echo constant('URL'); ?>public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Catalogo de Servicios</title>
    <script src="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/js/splide.min.js"></script>
    </head>

    <body>
    <!-- CABECERA -->
    <header class="cabeceras">
        <div class="numeros">
            <div class="contenedor1">
                <span class="label">Aló Kallpa</span>
                <a id="linea2" href="tel:+5116354338" class="numeroT">635 4338</a>
            </div>
            <div class="contenedor1">
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

        <!-- MENU DE OPCIONES -->
        <nav class="menuOpciones">
           <div id="menu" class="navegacion">
               <ul class="lista-menu">
                    <li class="logo-kallpa">
                        <a href="">
                            <img src="<?php echo constant('URL'); ?>public/Img/Kallpa1.png">
                        </a>
                    </li>
                    <li class="menu-item">
                        <div class="item-label-icon" data-toggle="collapse" href="" role="button" aria-expanded="false" aria-controls="submenu1">
                            <i class="mdi mdi-home-assistant"></i>
                            <a href="" class="menu-link">InfoKallpa</a>
                        </div>
                        <div id="submenu2" class="submenuContenedor contenedor-menu collapse">
                            <ul class="row">
                                <li class="col"><a href="" ><i class="mdi mdi-book-edit-outline"></i><span>Nuestra Historia</span></a></li>
                                <li class="col"><a href=""><i class="mdi mdi-eye-outline"></i><span>Visión y misión</span></a></li>
                                </ul>
                        </div>
                    </li>
                    <li class="menu-item">
                        <div class="item-label-icon" data-toggle="collapse" href="" role="button" aria-expanded="false" aria-controls="submenu2">
                            <i class="mdi mdi-home-assistant"></i>
                            <a href="" class="menu-link">Hogar</a>
                        </div>
                    </li>
                    <li class="menu-item">
                        <div class="item-label-icon" data-toggle="collapse" href="#submenu2" role="button" aria-expanded="false" aria-controls="submenu2">
                            <i class="mdi mdi-palette-swatch-variant"></i>
                            <a href="<?php echo constant('URL'); ?>catalogo" class="menu-link">Catalogo Virtual</a>
                        </div>
                        <div id="submenu2" class="submenuContenedor contenedor-menu collapse">
                            <ul class="row">
                                <li class="col"><a href="<?php echo constant('URL'); ?>catalogo"><i
                                                class="mdi mdi-air-humidifier"></i><span>Gasodomésticos</span></a></li>
                                <li class="col"><a href="<?php echo constant('URL'); ?>catalogoservicios"><i
                                                class="mdi mdi-account-wrench"></i><span>Servicios</span></a></li>   
                            </ul>
                        </div>
                    </li>
                    <li class="menu-item">
                        <div class="item-label-icon" data-toggle="collapse" href="" role="button" aria-expanded="false" aria-controls="submenu3">
                            <i class="mdi mdi-face-agent"></i>
                            <a href="" class="menu-link">Atencion al cliente</a>
                        </div>
                        <div id="submenu2" class="submenuContenedor contenedor-menu collapse">
                            <ul class="row">
                                <li class="col1"><a href=""><i class="mdi mdi-help"></i><span>Preguntas frecuentes</span></a></li>
                                <li class="col1"><a href=""><i class="mdi mdi-archive-check-outline"></i><span>Buzón de sugerencias</span></a></li>
                                <li class="col1"><a href=""><i class="mdi mdi-notebook-check-outline"></i><span>Libro de reclamaciones</span></a></li>
                            </ul>
                        </div>
                    </li>
               </ul>
           </div>    
        </nav>
    </header>
    <!-- LAYER -->
    <div class="container">
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide"><img src="<?php echo constant('URL')?>public/Img/CAT-layer2.png" /></li>
                        <li class="splide__slide"><img src="<?php echo constant('URL')?>public/Img/CAT-layer1.png" alt="" /></li>
                        <li class="splide__slide"><img src="<?php echo constant('URL')?>public/Img/CAT-layer3.png" alt="" /></li>
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
    
    <div class="contenedorPrincipal">
    <!-- OPCIONES DE MANEJADOR -->
    <div class="opcionesA1">
        <a href="<?php echo constant('URL'); ?>catalogo">
           <button class="botonB1">GASODOMÉSTICOS</button>
        </a>
        <a href="<?php echo constant('URL'); ?>catalogoservicios">
           <button class="botonA1">SERVICIOS</button>
        </a>
    </div>
    <!----Listado de Servicios--->
    <div class="contenedorServicios">
        <div class="servicio1">
            <h2 class="tituloS">Instalación de gas natural</h2>
            <p></p>
            <div class="detalleS">

            </div>
        </div>
        <div class="servicio2">
            <h2 class="tituloS">Habilitación de domicilio</h2>
        </div>
    </div>
</div>
<div class="contenedorSecundario">
</div>
    </body>
</html>