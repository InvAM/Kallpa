<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Portal Web Kallpa</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/portalWebKallpa.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/css/splide-core.min.css">
    <script src="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/js/splide.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/@splidejs/splide@3.0.9/dist/js/splide.min.js"></script>
    <script src="script.js"></script>
</head>

<body>
    <div>
        <?php require_once "views/portalHeader.php"; ?>
        <h3>
            <?php
            echo $this->nombrecliente;
            ?>
        </h3>
        <div class="container">
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide"><img src="public/Img/SLIDER_KALLPA.png" alt="" /></li>
                        <li class="splide__slide"><img src="public/Img/SLIDER_KALLPA1.png" alt="" /></li>
                        <li class="splide__slide"><img src="public/Img/SLIDER_KALLPA2.png" alt="" /></li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="portal-cont-2" style="margin-top: 620px">

            <br><br><br>
            <h1 class="fuente-portal">Conéctate al servicio</h1>

            <a href="" class="custom-btn">
                <i class="mdi mdi-home-assistant"></i>
                <h1 class="titulo-btn">InfoKallpa</h1>
            </a>
            <a href="home" class="custom-btn">
                <i class="mdi mdi-home-heart"></i>
                <h1 class="titulo-btn">Hogar</h1>
            </a>
            <a href="" class="custom-btn">
                <i class="mdi mdi-palette-swatch-variant"></i>
                <h1 class="titulo-btn">Catálogo virtual</h1>
            </a>
            <a href="atencion" class="custom-btn">
                <i class="mdi mdi-face-agent"></i>
                <h1 class="titulo-btn">Atención al cliente</h1>
            </a>
        </div>

        <div class="portal-cont-3">
            <br><br>
            <h1 class="titulo1-cont3">"Conozcamos más del</h1>
            <h1 class="titulo2-cont3">Gas Natural"</h1>
            <a href="#slide1" class="custom-btn2">
                <i class="mdi mdi-gas-burner"></i>
                <h1 class="titulo-btn2">¿Qué es el gas natural?</h1>
            </a>
            <a href="#slide2" class="custom-btn2">
                <i class="mdi mdi-meter-gas-outline"></i>
                <h1 class="titulo-btn2">¿Cómo se distribuye?</h1>
            </a>
            <a href="#slide3" class="custom-btn2">
                <i class="mdi mdi-check-underline-circle-outline"></i>
                <h1 class="titulo-btn2">Más seguro para mi familia </h1>
            </a>
            <a href="#slide4" class="custom-btn2">
                <i class="mdi mdi-account-heart-outline"></i>
                <h1 class="titulo-btn2">Más limpio para mi salud</h1>
            </a>
            <a href="#slide5" class="custom-btn2">
                <i class="mdi mdi-currency-usd"></i>
                <h1 class="titulo-btn2">Más económico</h1>
            </a>
            <a href="#slide6" class="custom-btn2">
                <i class="mdi mdi-star-check-outline"></i>
                <h1 class="titulo-btn2">Servicio continuo</h1>
            </a>
            <a href="#slide7" class="custom-btn2">
                <i class="mdi mdi-shield-lock-outline"></i>
                <h1 class="titulo-btn2">Consejos de seguridad </h1>
            </a>

        </div>

        <div class="portal-cont4">
            <ul class="slider">
                <li id="slide1">
                    <img src="public/Img/SLIDER_KALLPA_4.png" alt="">
                </li>
                <li id="slide2">
                    <img src="public/Img/SLIDER_KALLPA_5.png" alt="">
                </li>
                <li id="slide3">
                    <img src="public/Img/SLIDER_KALLPA_6.png" alt="">
                </li>
                <li id="slide4">
                    <img src="public/Img/SLIDER_KALLPA_7.png" alt="">
                </li>
                <li id="slide5">
                    <img src="public/Img/SLIDER_KALLPA_8.png" alt="">
                </li>
                <li id="slide6">
                    <img src="public/Img/SLIDER_KALLPA_9.png" alt="">
                </li>
                <li id="slide7">
                    <img src="public/Img/SLIDER_KALLPA_10.png" alt="">
                </li>
            </ul>
            <ul class="menu">
                <li>
                    <a href="#slide1"><i class="mdi mdi-gas-burner"></i></a>
                </li>
                <li>
                    <a href="#slide2"><i class="mdi mdi-meter-gas-outline"></i></a>
                </li>
                <li>
                    <a href="#slide3"><i class="mdi mdi-check-underline-circle-outline"></i></a>
                </li>
                <li>
                    <a href="#slide4"><i class="mdi mdi-account-heart-outline"></i></a>
                </li>
                <li>
                    <a href="#slide5"><i class="mdi mdi-currency-usd"></i></a>
                </li>
                <li>
                    <a href="#slide6"><i class="mdi mdi-star-check-outline"></i></a>
                </li>
                <li>
                    <a href="#slide7"><i class="mdi mdi-shield-lock-outline"></i></a>
                </li>
            </ul>
        </div>


        <script>
            new Splide('.splide', {
                type: 'loop',
                autoplay: true,
                interval: '2000',
                pagination: false,
            }).mount();
        </script>


    </div>
    <?php require_once "views/chatbot.php"; ?>
</body>

</html>