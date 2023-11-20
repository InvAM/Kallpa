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
    <form>
        <fieldset>

                <div class="container">
                    <div class="column">
                        <p>Ubicación: San Martin - Av. Los Jazmines 958</p>
                    </div>
                    <div class="column">
                        <div class="titulo">
                            <h1>Sugerencias</h1>
                        </div>
                        <br>
                        <br>
                        <div class="alineardr">
                            <input type="text" name="nombre" placeholder="Nombres">
                        </div>
                        <div class="alineariz">
                            <input type="text" name="apellidos" placeholder="Apellidos">
                        </div>
                        <div class="center-vertically">
                            <input type="text" name="Email" placeholder="Email" required><br><br>
                        </div>
                        <div class="center-vertically">
                            <textarea name="Comentario" placeholder=" Comentario" required></textarea>
                            <br>
                            <br>
                        </div>
                        <br>
                        <input type="submit" value="Enviar">
                    </div>
                </div>

        </fieldset>
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