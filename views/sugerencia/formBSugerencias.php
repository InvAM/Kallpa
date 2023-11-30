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
         <div class="container">

                    <div class="titulo">
                        <h1>Sugerencias</h1>
                    </div>

                    <div class="alineardr">
                        <label>Nombres</label>
                        <input type="text" name="nombres_s" placeholder="Nombres" id="nombres_s">
                    </div>

                    <div class="alineariz">
                        <label>Apellidos</label>
                        <input type="text" name="apellidos_s" placeholder="Apellidos" id="apellidos_s">
                    </div>

                    <div class="center-vertically">
                        <label>Dni</label>
                        <input type="text" name="Dni" placeholder="Dni" required id="Dni">
                    </div>

                    <div class="center-vertically">
                        <label>Email</label>
                        <input type="text" name="email_s" placeholder="Email" required id="email_s">
                    </div>

                    <div class="center-vertically">
                        <label>Comentario</label>
                        <textarea name="comentario_s" placeholder="Comentario" required class="txt" id="comentario_s"></textarea>
                    </div>
                    <button id="btnRegistrarS" name="btnRegistrarS">
                        Registrar <i class="mdi mdi-plus"></i>
                    </button>
                    <button id="btnLimpiarS" name="btnLimpiarS">
                        Limpiar <i class="mdi mdi-restore"></i>
                    </button>
            </div>

        <footer>
                <div class="footer-content">
                    <p>&copy; 2023 Kallpa. Todos los derechos reservados.</p>
                </div>
        </footer>
    
    </div>
    <?php require_once "views/chatbot.php"; ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="<?php echo constant('URL'); ?>public/js/sugerencias.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>