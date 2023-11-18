<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <title>Registrar Contrato</title>
    <link rel="stylesheet" href="public/css/formRegistrarContrato.css">
</head>

<body>
    <div class="registrar-contrato">

        <?php require_once "views/header.php"; ?>

        <div class="cont-1">
            <div class="titulo-principal">
                <h2 class="titulo1">Registro de</h2>
                <h2 class="titulo2">Contratos</h2>
            </div>
        </div>

        <div class="cont-2">
            <h3 class="subtitulo-cli">Datos Generales del Cliente</h3>
            <div class="cont-cliente">
                <div class="icono-cliente">
                    <i class="mdi mdi-account-search"></i>
                </div>
                <div class="grupo1">
                    <label for="">DNI</label>
                    <input type="text" label="" placeholder="Escribir..." name="" id="">
                </div>
                <div class="grupo2">
                    <label for="">Nombres y Apellidos del usuario</label>
                    <input type="text" label="" placeholder="Escribir..." name="" id="">
                    <label for="">Domicilio del usuario</label>
                    <input type="text" label="" placeholder="Escribir..." name="" id="">
                </div>
                <div class="boton-cli">
                    <button class="boton-buscar">Buscar Cliente</button>
                </div>
            </div>
        </div>

        <div class="cont-3">
            <h3 class="sub-contrato">Datos del Contrato</h3>
            <div class="cont-contrato">
            <div class=grupo1-cont >
                <label for="">Asesor</label>
                <select name="" id="">
                    <option value="0">Nombre y Apellido del Asesor</option>
                    <option value="1">Camila Ocaña</option>
                    <option value="2">Carlos Alcedo</option>
                </select>
                <label for="">Número de Radicando</label>
                <input type="text" label="" placeholder="Escribir..." name="" id="">
                <label for="">Tipo de instalación</label>
                <select name="" id="">
                    <option value="0">Escoger...</option>
                </select>
            </div>
            <div class="grupo2-cont">
                <label for="">Punto de instalación</label>
                <select name="" id="">
                    <option value="0">1</option>
                    <option value="1">2</option>
                </select>
                <label for="">Categoría del Gabinete</label>
                <select name="" id="">
                    <option value="0">Categoría</option>
                </select>
                <label for="">HUD</label>
                <input type="text" label="" placeholder="Escribir..." name="" id="">
            </div>

            </div>
        </div>

        <div class="cont-4">
            <div class="linea">
                <div>
                    <img src="public/Img/Kallpa.png" class="imagen-kallpainfo">
                </div>
            </div>
        </div>

        <div class="cont-5">
            <div class="grupo1-boton">
                <button class="boton1">Limpiar</button>
                <button class="boton1">Registrar</button>
                <button class="boton1">Atras</button>
            </div>
            <div class="grupo2-boton">
                <div class="icono">
                <i class="mdi mdi-printer"></i>
                </div>
                <button class="boton2">Imprimir</button>
            </div>
        </div>

    </div>

    
</body>


</html>