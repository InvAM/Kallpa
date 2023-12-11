<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/portalCatalogoServicios.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/css/splide-core.min.css">
    <link rel="icon" href="<?php echo constant('URL'); ?>public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Catalogo de Servicios</title>
    <script src="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/js/splide.min.js"></script>
</head>

<body>
    <!-- CABECERA -->
    <?php require_once "views/portalHeader.php"; ?>
    <!-- LAYER -->
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
                <div class="textos">
                    <p>La instalación de gas natural en un hogar o un edificio generalmente es un proceso complejo, que
                        requiere ciertos conocimientos</p>
                    <p>por eso nuestra empresa ofrece técnicos capacitados y certificados para llevar acabo este proceso
                        crucial para la adquisición </p>
                    <p>de gas natural es así como garantizamos seguridad y calidad</p>
                </div>
                <div class="detalleS">
                    <div class="subtituloD">
                        <p>¿Qué realizamos?</p>
                    </div>
                    <div class="acciones">
                        <div class="containerEspecial">
                            <div class="acc1">
                                <i class="mdi mdi-account-hard-hat"></i>
                                <label>Construcción e instalación de gabinetes</label>
                            </div>
                            <div class="acc1">
                                <i class="mdi mdi-alpha-m-box"></i>
                                <label>Construcción de murete</label>
                            </div>
                        </div>

                        <div class="containerEspecial">
                            <div class="acc1">
                                <i class="mdi mdi-home-city"></i>
                                <label>Instalación interna</label>
                            </div>
                            <div class="acc1">
                                <i class="mdi mdi-connection"></i>
                                <label>Conexiones a puntos de uso</label>
                            </div>
                        </div>
                        <button class="boton-servicio" id="btnInstalacion" name="btnInstalacion">
                            <i class="mdi mdi-cart-percent"></i>
                            ¡Solicítalo ya!
                        </button>
                    </div>
                </div>
            </div>
            <div class="servicio2">
                <h2 class="tituloS">Habilitación de domicilio</h2>
                <div class="textos">
                    <p>La habilitación de gas natural implica una serie de procesos y verificaciones necesarias para
                        garantizar que un sistema de gas</p>
                    <p>esté listo y seguro para su uso. Por ello, nuestra empres, ofrece a profesionales especializados
                        en la habilitación y un supervisor </p>
                    <p>de Cállida que garanticen una habilitación de calidad y segura</p>
                </div>
                <div class="detalleS">
                    <div class="subtituloD">
                        <p>¿Qué realizamos?</p>
                    </div>
                    <div class="acciones">
                        <div class="containerEspecial">
                            <div class="acc1">
                                <i class="mdi mdi-account-tie"></i>
                                <label>Inspección de instalación</label>
                            </div>
                            <div class="acc1">
                                <i class="mdi mdi-eye-circle"></i>
                                <label>Verificación de conexiones y equipos</label>
                            </div>
                        </div>

                        <div class="containerEspecial">
                            <div class="acc1">
                                <i class="mdi mdi-ev-station"></i>
                                <label>Pruebas de hermeticidad</label>
                            </div>
                            <div class="acc1">
                                <i class="mdi mdi-storage-tank-outline"></i>
                                <label>Activación de suministro de gas</label>
                            </div>
                        </div>
                        <button class="boton-servicio" name="btnHabilitacion" id="btnHabilitacion">
                            <i class="mdi mdi-cart-percent"></i>
                            ¡Solicítalo ya!
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedorSecundario">
            <div class="contenedorTexto">
                <h1>¿Cómo lo hacemos?</h1>
            </div>
            <div class="contenedorVideo">
                <iframe src="https://www.youtube.com/embed/eb3Md3daflo?si=xBXxYH-pH9MrE1EL" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
            </div>
        </div>
        <?php require_once "views/chatbot.php"; ?>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="<?php echo constant('URL'); ?>public/js/catalogoservicios.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>