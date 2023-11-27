<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="public/css/formLoginP.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.all.min.js"></script>

</head>

<body class="login">

    <div id="contenedor">
        <form method="POST" class="formularioLogin" data-form="save">

            <fieldset class="cajita1"><br><br>
                <div>
                    <img src="public/Img/Kallpa.png" alt="Logo_Kallpa" class="imagen">
                </div><br><br>
                <h2>Identificarse</h2>
                <h2 class="titulo">Bienvenido</h2>
                <img class="Centro1"
                    src="https://img.freepik.com/vector-premium/icono-circulo-usuario-anonimo-ilustracion-vector-estilo-plano-sombra_520826-1931.jpg"
                    alt="Correo electrónico" width="140" height="140">
                <br>
                <hr class="linea">
                <br>
                <div class="center-vertically">
                    <img class="icon" src="https://cdn-icons-png.flaticon.com/128/1636/1636046.png" alt="Dni" width="30"
                        height="30">
                    <input class="log" type="text" name="dni" placeholder="Dni"><br>
                </div>
                <br>
                <div class="center-vertically">
                    <img class="icon" src="https://cdn-icons-png.flaticon.com/512/6067/6067201.png" alt="Usuario"
                        width="30" height="30">
                    <input class="log" type="text" name="nombreusuario" placeholder="Usuario"><br>
                </div>
                <br>
                <div class="center-vertically">
                    <img class="icon" src="https://cdn-icons-png.flaticon.com/512/223/223122.png" alt="Contraseña"
                        width="30" height="30">
                    <input class="log" type="password" name="password" placeholder="Contraseña" required><br>
                </div>
                <br>
                <div class="check">

                    <input type="checkbox" id="check" name="check" value="1">
                    <label for="check">Guardar clave</label>

                    <a style="margin-left: 69px" href="">¿Olvidaste tu contraseña?</a>

                </div>
                <br>
                <br>

                <input type="submit" value="Ingresar">
            </fieldset>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL') ?>public/js/formLoginP.js"></script>
</body>

</html>