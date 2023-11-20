<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/defaultPortal.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/css/splide-core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <script src="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/js/splide.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="headerp">
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
                            <div class="item-label-icon" data-toggle="collapse" href="" role="button"
                                aria-expanded="false" aria-controls="submenu1">
                                <i class="mdi mdi-home-assistant"></i>
                                <a href="infoKallpa" class="menu-link">InfoKallpa</a>
                            </div>
                            <div id="submenu2" class="submenuContenedor contenedor-menu collapse">
                                <ul class="row">
                                    <li class="col">
                                        <a onclick="scrollToSection('nuestraHistoria')" href="#quienesSomos">
                                            <i class="mdi mdi-book-edit-outline"></i><span>Quiénes somos</span>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a onclick="scrollToSection('visionYmision')" href="#viymi">
                                            <i class="mdi mdi-eye-outline"></i><span>Visión y misión</span>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a onclick="scrollToSection('valor')" href="#valores">
                                            <i class="mdi mdi-handshake-outline"></i><span>Nuestros valores</span>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a onclick="scrollToSection('ubicacion')" href="#encuentranos">
                                            <i class="mdi mdi-map-marker-outline"></i><span>Encuéntranos</span>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a onclick="scrollToSection('contacto')" href="#contactanos">
                                            <i class="mdi mdi-card-account-mail-outline"></i><span>Contáctanos</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="menu-item">
                            <div class="item-label-icon" data-toggle="collapse" href="" role="button"
                                aria-expanded="false" aria-controls="submenu2">
                                <i class="mdi mdi-home-heart"></i>
                                <a href="home" class="menu-link">Hogar</a>
                            </div>
                        </li>

                        <li class="menu-item">
                            <div class="item-label-icon" data-toggle="collapse" href="#submenu2" role="button"
                                aria-expanded="false" aria-controls="submenu2">
                                <i class="mdi mdi-palette-swatch-variant"></i>
                                <a href="catalogo" class="menu-link">Catálogo Virtual</a>
                            </div>
                            <div id="submenu2" class="submenuContenedor contenedor-menu collapse">
                                <ul class="row">

                                    <li class="col"><a href="catalogo"><i
                                                class="mdi mdi-air-humidifier"></i><span>Gasodomésticos</span></a></li>
                                    <li class="col"><a href="catalogoservicios"><i
                                                class="mdi mdi-account-wrench"></i><span>Servicios</span></a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="menu-item">
                            <div class="item-label-icon" data-toggle="collapse" href="" role="button"
                                aria-expanded="false" aria-controls="submenu3">
                                <i class="mdi mdi-face-agent"></i>
                                <a href="atencion" class="menu-link">Atención al cliente</a>
                            </div>
                            <div id="submenu2" class="submenuContenedor contenedor-menu collapse">
                                <ul class="row">
                                    <li class="col1"><a href="preguntasFrecuentes"><i
                                                class="mdi mdi-help"></i><span>Preguntas
                                                frecuentes</span></a></li>
                                    <li class="col1"><a href="sugerencias"><i
                                                class="mdi mdi-archive-check-outline"></i><span>Buzón
                                                de sugerencias</span></a></li>
                                    <li class="col1"><a href="reclamaciones"><i
                                                class="mdi mdi-notebook-check-outline"></i><span>Libro de
                                                reclamaciones</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="menu-item">
                            <div class="item-label-icon" data-toggle="collapse" href="#submenu4" role="button"
                                aria-expanded="false" aria-controls="submenu4">
                                <!-- Icono para la nueva opción -->
                                <!-- Texto de la nueva opción -->
                                <a href="#" class="logo-usuario ">
                                    <img class="imglogin" src="public/Img/usuario (3).png">
                                </a>
                            </div>
                            <!-- Submenú de la nueva opción -->
                            <div id="submenu4" class="submenuContenedor contenedor-menu collapse">
                                <ul class="row">
                                    <li class="col">
                                        <a href="#" onclick="mostrarVentanaEmergente()">
                                            <i class="mdi mdi-account"></i><span>Ingresar como cliente</span>
                                        </a>
                                    </li>
                                    <li class="col">
                                        <a href="Login">
                                            <i class="mdi mdi-account"></i><span>Ingresar como trabajador</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

            </nav>

        </header>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.min.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/formLoginCli.js"></script>
    <style>
        .custom-popup-class {
            background: transparent !important;
        }
    </style>
</body>

</html>

<script>

    function scrollToSection(sectionId) {
        const section = document.getElementById(sectionId);
        const windowHeight = window.innerHeight;
        const sectionHeight = section.clientHeight;
        const scrollTo = section.offsetTop - (windowHeight - sectionHeight) / 2;
        window.scrollTo({
            top: scrollTo,
            behavior: "smooth"
        });
    }

</script>