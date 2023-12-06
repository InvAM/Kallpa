<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <title>Atención al cliente</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/atencionCliente.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/splide-4.1.3/dist/css/splide-core.min.css">
    <script src="https://unpkg.com/@splidejs/splide@3.0.9/dist/js/splide.min.js"></script>
    <script src="script.js"></script>
</head>

<body>
    <div class="atcl">
        <?php require_once "views/portalHeader.php"; ?>
        
        <div class="container">
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide"><img class="imagen" src="public/Img/ATCL1.png" alt="" /></li>
                        <li class="splide__slide"><img class="imagen" src="public/Img/ATCL2.png" alt="" /></li>
                        <li class="splide__slide"><img class="imagen" src="public/Img/ATCL3.png" alt="" /></li>
                        <li class="splide__slide"><img class="imagen" src="public/Img/ATCL4.png" alt="" /></li>
                    </ul>
                </div>
            </div>
        </div>

        <section class="caja-seccion">
            <p class="p-info">¿Cómo podemos ayudarte?</p>
            <div class="cajasobrekallpa">

                <a class="separar" href="preguntasFrecuentes">
                    <div class="informacion pers-mivi scale-up-center">
                        <div class="subirimg2">
                            <img src="public/Img/pf.png">
                        </div>
                        <p class="tit-desc">Preguntas frecuentes</p>
                    </div>
                </a>

                <a class="separar" href="sugerencias">
                    <div class="informacion pers-mivi scale-up-center">
                        <div class="subirimg2">
                            <img src="public/Img/bs.png">
                        </div>
                        <p class="tit-desc">Buzón de sugerencias</p>
                    </div>
                </a>

                <a class="separar" href="reclamaciones">
                    <div class="informacion pers-mivi scale-up-center">
                        <div class="subirimg2">
                            <img src="public/Img/lr.png">
                        </div>
                        <p class="tit-desc">Libro de reclamaciones</p>
                    </div>
                </a>

            </div>
        </section>

        <footer>
            <div class="footer-content">
                <p>&copy; 2023 Kallpa. Todos los derechos reservados.</p>
            </div>
        </footer>

    </div>
    <?php require_once "views/chatbot.php"; ?>
</body>

<script>
    new Splide('.splide', {
        type: 'loop',
        autoplay: true,
        interval: '2000',
        pagination: false,
    }).mount();
</script>

</html>