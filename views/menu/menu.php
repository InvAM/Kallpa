<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?php echo constant('URL') ?>public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/menu.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>¡Bienvenido!</title>
</head>

<body>
    <div class="contenedorP">
        <div class="contenedor1">
            <h1 class="titulo-bien">
                <span>¡Bienvenido!</span>
                <?php echo $this->nombreEmpleado; ?>
            </h1>
            <img src="public/Img/Kallpa.png" alt="Kallpa" class="Img1">
            <img src="public/Img/usuario (3).png" alt="Usuario" class="Img2">
            <h3 class="texto-center titulo-acc border-bien">
                Accesos Rápidos
            </h3>
            <div class="accesos-rapidos">
                <a href="https://acortar.link/yhk230" target="_blank">
                    <div>
                        <img class="btnAcceso" src="public/Img/descarga.png" alt="Sunat">

                    </div>
                </a>
                <!-- Repite esta estructura para los otros accesos rápidos -->
                <a href="https://acortar.link/yhk230" target="_blank">
                    <div>
                        <img class="btnAcceso" src="public/Img/Gmail_icon_(2020).svg.png" alt="Sunat">
                    </div>
                </a>
                <a href="https://acortar.link/yhk230" target="_blank">
                    <div>
                        <img class="btnAcceso" src="public/Img/Google_Drive_icon_(2020).svg.png" alt="Drive">
                    </div>
                </a>
                <a href="https://acortar.link/yhk230" target="_blank">
                    <div>
                        <img class="btnAcceso" src="public/Img/300221.png" alt="Google">
                    </div>
                </a>
                <a href="https://acortar.link/yhk230" target="_blank">
                    <div>
                        <img class="btnAcceso"
                            src="public/Img/calidda-gas-natural-del-peru-logo-55DA79B832-seeklogo.com.png"
                            alt="Calidda">
                    </div>
                </a>
            </div>
            <div class="datos">
                <iframe class="mapa"
                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d975.6154608234186!2d-77.08231177157111!3d-12.011693087518982!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTLCsDAwJzQyLjEiUyA3N8KwMDQnNTQuMCJX!5e0!3m2!1ses-419!2spe!4v1696353389618!5m2!1ses-419!2spe"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div class="centro">
                    <div style="display: inline-block; vertical-align: middle;">
                        <i class="mdi mdi-store-marker"
                            style="width: 50px; height: 50px; font-size: 50px; color: white;"></i>
                    </div>
                    <div style="display: inline-block; vertical-align: middle;">
                        <span class="dato">Av. Los Arquitectos 510 - Los Olivos</span>
                    </div>
                    <hr class="separador">
                    </hr>
                    <div style="display: inline-block; vertical-align: middle;">
                        <i class="mdi mdi-cellphone"
                            style="width: 40px; height: 40px; font-size: 50px; color: white;"></i>
                    </div>
                    <div style="display: inline-block; vertical-align: middle;">
                        <span class="dato">941-301-020 / 975-740-428</span>
                    </div>
                    <hr class="separador">
                    </hr>
                    <div style="display: inline-block; vertical-align: middle;">
                        <i class="mdi mdi-phone" style="width: 50px; height: 40px; font-size: 40px; color: white;"></i>
                    </div>
                    <div style="display: inline-block; vertical-align: middle;">
                        <span class="dato">(01) 6354338</span>
                    </div>
                    <hr class="separador">
                    </hr>
                    <div style="display: inline-block; vertical-align: middle;">
                        <i class="mdi mdi-email" style="width: 50px; height: 40px; font-size: 40px; color: white;"></i>
                    </div>
                    <div style="display: inline-block; vertical-align: middle;">
                        <span class="dato1">atencionalcliente@kallpacontratistas.com</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="contenedor2">
            <div class="titulo">
                <h1>
                    ¿Qué acción realizaremos?
                </h1>
                    <div class="moverbtncerrar"><button onclick="redireccionar('cerrarSesion')" class="botoncerrar">
                            <img class="imgbtncerrar" src="public/Img/cerrar.png" alt="Cerrar Sesion">
                        </button>
                        </div>          </div>
            <hr class="separador2">
            </hr>
            <div>
                <ul class="button-grid">

                    <li>
                        <button onclick="redireccionar('registrarContrato')" class="boton">
                            <img class="imgbtn" src="public/Img/contrato (3).png" alt="Registrar Contrato">
                        </button>
                        <p class="tximg">Registrar Contrato</p>
                    </li>

                    <li>
                        <button onclick="redireccionar('registrarCliente')" class="boton">
                            <img class="imgbtn" src="public/Img/registro (2).png" alt="Registrar Cliente">
                        </button>
                        <p class="tximg">Registrar Cliente</p>
                    </li>

                    <li>
                        <button onclick="redireccionar('registrarEmpleado')" class="boton">
                            <img class="imgbtn" src="public/Img/registrarse.png" alt="Registrar Empleado">
                        </button>
                        <p class="tximg">Registrar Empleado</p>
                    </li>

                    <li>
                        <button onclick="redireccionar('ConsultarContrato')" class="boton">
                            <img class="imgbtn" src="public/Img/buscar (1).png" alt="Consultar Contrato">
                        </button>
                        <p class="tximg">Consultar Contrato</p>
                    </li>

                    
                    <li>
                    <button onclick="redireccionar('evaluarContrato')" class="boton">
                            <img class="imgbtn" src="public/Img/evaluacion.png" alt="Evaluar Contrato">
                        </button>
                        <p class="tximg">Evaluar Contrato</p>
                    </li>

                    <li>
                        <button onclick="redireccionar('registrarMateriales')" class="boton">
                            <img class="imgbtn" src="public/Img/materiales (1).png" alt="Asignar Materiales">
                        </button>
                        <p class="tximg">Asignar Materiales</p>
                    </li>

                    <li>
                        <button onclick="redireccionar('registrarMate')" class="boton">
                            <img class="imgbtn" src="public/Img/materias-primas.png" alt="Registrar Materiales">
                        </button>
                        <p class="tximg">Registrar Materiales</p>
                    </li>

                    <li>
                    <button onclick="redireccionar('registrarProducto')" class="boton">
                            <img class="imgbtn" src="public/Img/electrodomesticos.png" alt="Registrar Productos">
                        </button>
                        <p class="tximg">Registrar Productos</p>
                    </li>
                </ul>
            </div>
            </div>
        </div>

    </div>
    <script>
        function redireccionar(destino) {
            window.location.href = destino;
        }
    </script>
</body>

</html>