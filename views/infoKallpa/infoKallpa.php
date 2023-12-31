<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/infoKallpa.css">
    <title>InfoKallpa</title>
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
</head>

<body>
    <div class="info">
        <?php require_once "views/portalHeader.php"; ?>
        <?php require_once "views/slider.php"; ?>

        <section id="nuestraHistoria" class="caja-seccion fondoimg">
            <div class="cajasobrekallpa1">
                <div class="informacion">
                    <p class="p1-info"> ¿Quiénes somos?</p>
                    <p class="p2-info"> Kallpa Contratistas y Suministros en general SAC</p>
                    <p class="p3-info"> Somos una empresa
                        joven prestadora de servicios y suministros, conformada por un
                        equipo multidisciplinario de personal profesional y técnico altamente
                        calificado de vasta experiencia, que busca atender las necesidades
                        de nuestros clientes. Trabajamos cumpliendo las exigencias de calidad,
                        seguridad y medio ambiente.</p>
                </div>

            </div>
        </section>

        <section id="visionYmision" class="caja-seccion1">
            <p class="p7-info">Nuestra Visión y Misión</p>
            <div class="cajasobrekallpa5">
                <div class="separar">
                    <div class="informacion1 pers-mivi scale-up-center">
                        <div class="subirimg2">
                            <img src="public/Img/mi.png">
                        </div>
                        <p class="tit-desc">Misión</p>
                        <p class="desc2">Satisfacer las necesidades y expectativas de nuestros clientes, entregando
                            suministros y servicios de calidad con precios competitivos, desarrollando a nuestro
                            personal, que es nuestro principal activo, para contribuir con el crecimiento del
                            país.
                        </p>
                    </div>
                </div>

                <div class="separar">
                    <div class="informacion1 pers-mivi scale-up-center">
                        <div class="subirimg2">
                            <img src="public/Img/vi.png">
                        </div>
                        <p class="tit-desc">Visión</p>
                        <p class="desc2">Consolidar nuestra presencia en el mercado nacional, satisfaciendo los
                            requerimientos de nuestros clientes en cuanto a entregas oportunas, calidad de
                            servicio, seguridad del personal; a través de un equipo de trabajo competente e
                            identificado con los valores de la empresa.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <div id="valor" class="caja-seccion2">
            <div class="cajasobrekallpa2">
                <p class="p4-info">Valores</p>
                <div class="centrarsplide">
                    <div class="slider-container c">
                        <div class="splide" id="splide1">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide c1">
                                        <div class="subirimg">
                                            <img src="public/Img/traequ.png" class="img2">
                                        </div>
                                        <p class="valores">Trabajo en equipo</p>
                                        <p class="desc-val">Para lograr cumplir objetivos comunes.</p>
                                    </li>
                                    <li class="splide__slide c1">
                                        <div class="subirimg">
                                            <img src="public/Img/hon.png" class="img2">
                                        </div>
                                        <p class="valores">Honestidad</p>
                                        <p class="desc-val">Hablar con la verdad, para lograr una congruencia entre el
                                            pensar, decir y actuar.</p>
                                    </li>
                                    <li class="splide__slide c1">
                                        <div class="subirimg">
                                            <img src="public/Img/prof.png" class="img2">
                                        </div>
                                        <p class="valores">Profesionalismo</p>
                                        <p class="desc-val">Logrado a través de la disciplina, confianza y deseos de
                                            aprender y progresar.</p>
                                    </li>
                                    <li class="splide__slide c1">
                                        <div class="subirimg">
                                            <img src="public/Img/resp.png" class="img2">
                                        </div>
                                        <p class="valores">Respeto</p>
                                        <p class="desc-val">Mostramos aprecio y cuidado por el valor que tienen las
                                            personas.</p>
                                    </li>
                                    <li class="splide__slide c1">
                                        <div class="subirimg">
                                            <img src="public/Img/inno.png" class="img2">
                                        </div>
                                        <p class="valores">Innovación</p>
                                        <p class="desc-val">Utilizando la tecnología que permita el desarrollo de
                                            nuestra empresa.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="ubicacion" class="caja-seccion">
            <div class="cajasobrekallpa3">
                <div class="cajasobrekallpa7">
                    <p class="p6-info">¿Dónde nos puedes encontrar?</p>
                    <div class="subirimg">
                        <img src="public/Img/tecnico_2.png" class="img3">
                    </div>
                    <p class="p8-info">A.H. DANIEL ALCIDES CARRIÓN SECTOR A PASAJE 30 PJ. DANIEL ALCIDES CARRION Mz F1 Lote 4</p>
                </div>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d975.615460823407!2d-77.08231043039812!3d-12.011693087522204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTLCsDAwJzQyLjEiUyA3N8KwMDQnNTQuMCJX!5e0!3m2!1ses-419!2spe!4v1698718982319!5m2!1ses-419!2spe"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

        <section id="contacto" class="caja-seccion fondo1">
            <div class="cajasobrekallpa6">
                <p class="p5-info">Contáctanos</p>
                    <div class="cajasobrekallpa4">
                        <div class="contcontac">
                            <label for="nombre_c">Nombre:</label>
                            <input type="text" id="nombre_c" name="nombre_c">

                            <label for="celular_c">Número de Celular:</label>
                            <input type="tel" id="celular_c" name="celular_c">

                            <label for="correo_c">Correo Electrónico:</label>
                            <input type="email" id="correo_c" name="correo_c">

                            <label for="direccion">Dirección de Domicilio:</label>
                            <input type="text" id="direccion_c" name="direccion_c">
                        </div>
                        <div class="contcontac">
                            <label for="mensaje_c">Mensaje:</label>
                            <textarea id="mensaje_c" name="mensaje_c" rows="4" class="txtarea"></textarea>
                            <button id="btnEnviar" name="btnEnviar" class="bton">Enviar</button>
                        </div>
                    </div>
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
    document.addEventListener('DOMContentLoaded', function () {
        var splide = new Splide('#splide1', {
            type: 'loop',
            direction: 'ttb',
            height   : '500px',
            autoplay: true,
            interval: '2200',
            perPage: 3,
            focus: 'center',
            pagination: false,
        });
        splide.mount();
    });
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
                integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?php echo constant('URL'); ?>public/js/contactanos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>