<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Hogar</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/home.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/css/splide-core.min.css">
    <script src="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/js/splide.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/@splidejs/splide@3.0.9/dist/js/splide.min.js"></script>
    <script src="script.js"></script>
</head>

<body>
    <div>
        <?php require_once "views/portalHeader.php"; ?>

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

        <!--CONTENERDOR 2  -->
        <div class ="home-cont2">
            <img src="public/Img/familia.png" alt="">
            <p class="cont2-titulo">"Juntos, hacemos una familia, y con amor, construimos un hogar"</p>
            <p class="cont2-titulo2">- Kallpa</p>
            
        </div>

        <div class="home-cont3">
            <div class="titulo">
                <i class="mdi mdi-thumb-up-outline"></i>
                <h2 class="ParteA">Beneficios para</h2>
                <h2 class="ParteB"> mi hogar</h2>
            </div>
            <div class="row">
                <!-- 1 -->
                <div class="cont-img">
                    <img src="public/Img/proyecto-economia2.png" alt="">
                </div>
                <div class="r-cont1">
                    <h4>Ahorro</h4>
                    <p class="justificacion">
                    Ahorra hasta un 70% en comparación con la energía 
                    eléctrica y un 28% respecto al gas de balón (GLP). 
                    Paga solo por lo que consumes, pues cada usuario 
                    cuenta con un medidor.
                    </p>
                </div>
                <!-- 2 -->
                <div class="cont-img1">
                    <img src="public/Img/escudo.png" alt="">
                </div>
                <div class="r-cont2">
                    <h4>Seguridad</h4>
                    <p class="letra">
                    El Gas Natural es más ligero que el aire, ante una 
                    eventual fuga, se disipa rápidamente y no permanece
                    en el ambiente. El sistema de distribución de Gas Natural
                    es monitoreado desde el Centro de Control de Cálidda, 
                    las 24 horas del día, los 365 días del año.
                    </p>
                </div>
                <!-- 3 -->
                <div class="cont-img2">
                    <img src="public/Img/check.png" alt="">
                </div>
                <div class="r-cont3">
                    <h4>Comodidad</h4>
                    <p class="letra1">
                    Cocina o báñate con agua caliente sin interrupciones 
                    ya que el Gas Natural nunca se acaba. Es distribuido 
                    continuamente por tuberías subterráneas, como el agua.
                    </p>
                </div>
                <!-- 4 -->
                <div class="cont-img3">
                    <img src="public/Img/planeta.png" alt="">
                </div>
                <div class="r-cont4">
                    <h4>Limpieza</h4>
                    <p class="letra2">
                    El Gas Natural es una fuente de energía limpia que 
                    contribuye al cuidado del ambiente y de tu salud.
                    </p>
                </div>
            </div>
        </div>


        <!-- CONTENEDOR 4 -->
        <div class="home-cont4">
            <img src="public/Img/fondo.png" alt="">
            <div class="titulo">
                <p>Gas Natural</p>
            </div>
            <div class="logo">
                <img src="public/Img/KallpaC.png" alt="">
            </div>
            <div class="titulo2">
                <p>Kallpa</p>
            </div>
            <div class="imagen-bonogas">
                <img src="public/Img/bonogas.jpg" alt="">
            </div>
            <div class="cont-titulo3">
                <p class="titu1">BENEFICIOS DEL</p>
                <p class="titu2">GAS NATURAL</p>
            </div>
            <div class="cont-fondo">
                
            </div>
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

</body>

</html>