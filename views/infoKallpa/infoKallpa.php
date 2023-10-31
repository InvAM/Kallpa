<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/infoKallpa.css">
</head>

<body>
    <div class="info">
        <?php require_once "views/portalHeader.php"; ?>
        <?php require_once "views/slider.php"; ?>

        <section id="nuestraHistoria" class="caja-seccion fondo1">
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

                <div class="imagenh">
                    <img src="public/Img/HistoriaKallpa.jpeg">
                </div>

            </div>
        </section>

        <div class="caja-seccion fondo2">
            <div class="cajasobrekallpa2">
                <p class="p4-info">Valores</p>
                <div class="centrarsplide">
                    <div class="slider-container c">
                        <div class="splide" id="splide1">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    <li class="splide__slide c1">
                                        <div class="subirimg">
                                            <img src="public/Img/TrabajoEquipo.png">
                                        </div>
                                        <p class="valores">Trabajo en equipo</p>
                                        <p class="desc-val">Para lograr cumplir objetivos comunes.</p>
                                    </li>
                                    <li class="splide__slide c1">
                                        <div class="subirimg">
                                            <img src="public/Img/Honestidad.png">
                                        </div>
                                        <p class="valores">Honestidad</p>
                                        <p class="desc-val">Hablar con la verdad, para lograr una congruencia entre el
                                            pensar, decir y actuar.</p>
                                    </li>
                                    <li class="splide__slide c1">
                                        <div class="subirimg">
                                            <img src="public/Img/Profesionalismo.png">
                                        </div>
                                        <p class="valores">Profesionalismo</p>
                                        <p class="desc-val">Logrado a través de la disciplina, confianza y deseos de
                                            aprender y progresar.</p>
                                    </li>
                                    <li class="splide__slide c1">
                                        <div class="subirimg">
                                            <img src="public/Img/Respeto.png">
                                        </div>
                                        <p class="valores">Respeto</p>
                                        <p class="desc-val">Mostramos aprecio y cuidado por el valor que tienen las
                                            personas.</p>
                                    </li>
                                    <li class="splide__slide c1">
                                        <div class="subirimg">
                                            <img src="public/Img/Innovacion.png">
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

    <section id="visionYmision" class="caja-seccion fondo1">
        <div class="cajasobrekallpa1">
            <div class="separar">
                <div class="informacion pers-mivi" id="animatedElement">
                    <div class="subirimg2">
                        <img src="public/Img/Mision.png">
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
                <div class="informacion pers-mivi scale-up-center">
                    <div class="subirimg2">
                        <img src="public/Img/Vision.png">
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

    <section class="caja-seccion fondo2">
        <div class="cajasobrekallpa3">
            <p class="p4-info">¿Dónde nos puedes encontrar?</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d975.615460823407!2d-77.08231043039812!3d-12.011693087522204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTLCsDAwJzQyLjEiUyA3N8KwMDQnNTQuMCJX!5e0!3m2!1ses-419!2spe!4v1698718982319!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <section class="caja-seccion fondo1">
        <div class="cajasobrekallpa2">
            <p class="p5-info">Contáctanos</p>
            <form id="contact-form" method="post">
                <div class="cajasobrekallpa4">
                    <div class="contcontac">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required>

                        <label for="celular">Número de Celular:</label>
                        <input type="tel" id="celular" name="celular" required>

                        <label for="correo">Correo Electrónico:</label>
                        <input type="email" id="correo" name="correo" required>
                    </div>
                    <div class="contcontac">
                        <label for="mensaje">Mensaje:</label>
                        <textarea id="mensaje" name="mensaje" rows="4" required></textarea>

                        <button type="submit" class="bton">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
    <footer>
        <div class="footer-content">
            <p>&copy; 2023 Kallpa. Todos los derechos reservados.</p>
        </div>
    </footer>

</div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var splide = new Splide('#splide1', {
            type: 'loop',
            autoplay: true,
            interval: '2200',
            perPage: 3,
            focus: 'center',
            pagination: false,
        });
        splide.mount();
    });

    const animatedElement = document.getElementById('animatedElement');

    animatedElement.addEventListener('mouseenter', () => {
        animatedElement.style.transform = 'scale(1.1)';
    });

    animatedElement.addEventListener('mouseleave', () => {
        animatedElement.style.transform = 'scale(1)';
    });

</script>

</html>