<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Buzón de sugerencias</title>
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/formBSugerencia.css">
</head>

<body>
    <?php require_once "views/portalHeader.php"; ?>
    <div class="sug">
        <form action="<?php echo constant('URL'); ?>sugerencias/registrarSugerencia" method="POST" id="formSugerencia">
            <div class="container">

                    <div class="titulo">
                        <h1>Sugerencias</h1>
                    </div>

                    <div class="alineardr">
                        <input type="text" name="nombres_s" placeholder="Nombres" id="nombres_s">
                    </div>

                    <div class="alineariz">
                        <input type="text" name="apellidos_s" placeholder="Apellidos" id="apellidos_s">
                    </div>

                    <div class="center-vertically">
                        <input type="text" name="email_s" placeholder="Email" required id="email_s">
                    </div>

                    <div class="center-vertically">
                        <textarea name="comentario_s" placeholder="Comentario" required class="txt" id="comentario_s"></textarea>
                    </div>

                    <input type="submit" value="Enviar" id="btnRegistrarS" name="btnRegistrarS">
                
            </div>
        </form>

        <footer>
                <div class="footer-content">
                    <p>&copy; 2023 Kallpa. Todos los derechos reservados.</p>
                </div>
        </footer>
    
    </div>
    <?php require_once "views/chatbot.php"; ?>
</body>

</html>