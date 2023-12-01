<!-- header.php -->

<?php
//session_start();
$dniSesion = $_SESSION['dni'];

require_once "models/credencialesempleadomodel.php";

$credencialesModel = new CredencialesEmpleadoModel();
$inicialEmpleado = $credencialesModel->obtenerInicialNombre($dniSesion);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/default.css">
</head>

<body>
    <div class="cabecera">
        <div>
            <img src="<?php echo constant('URL'); ?>public/Img/Kallpa.png" class="imagen-kallpa">
        </div>
        <div class="perfil-circle">
            <?php echo $inicialEmpleado; ?>
            <div class="dropdown">
                <div class="dropdown-item"><a href="cerrarSesion">Cerrar Sesión</a></div>
            </div>
        </div>
    </div>

</body>

</html>