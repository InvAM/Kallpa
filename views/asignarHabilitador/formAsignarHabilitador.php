<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Asignar Técnico</title>
    <link rel="stylesheet" href="public/css/formAsignarHabilitador.css">
</head>

<body>
    <div class="asignar-H">
        <?php require_once "views/header.php"; ?>

        <div class="contenedorPT">
            <div class="tituloP">
                <h2 class="titulo-A">Asignar </h2>
                <h2 class="titulo-B">Técnico</h2>
            </div>
            <div class="contenedorP2">
                <div class="contenedorS1">
                    <p><strong>Técnicos</strong></p>
                    <div class="tabla-H">
                        <table class="custom-table-H">
                            <thead>
                                <tr>
                                    <th>DNI</th>
                                    <th>Categoria</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Celular</th>
                                    <th>Seleccionar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>71326122</td>
                                    <td>Habilitador</td>
                                    <td>Carlos José</td>
                                    <td>Alcedo Javier</td>
                                    <td>944891987</td>
                                    <td>
                                        <button class="btn-small btn-primary" onclick="seleccionarTecnico(item)">
                                            <i class="mdi mdi-content-copy mx-1"></i>
                                        </button>
                                    </td>
                                </tr>
                                <!--Más datos -->
                            </tbody>
                        </table>
                    </div>
                    <button class="boton-opciones-H"> Limpiar
                        <i class="mdi mdi-restore"></i></button>
                    <button class="boton-opciones-H"> Atras
                        <i class="mdi mdi-keyboard-backspace"></i></button>
                    <button class="boton-especial"> Asignar Habilitador
                        <i class="mdi mdi-arrow-right-drop-circle"></i></button>
                </div>
                <div class="contenedorS2">
                    <div class="CajaHabilitador">
                        <p class="TI2">Datos del Habilitador</p>
                        <div class="imagenH">
                            <i class="mdi mdi-account-eye"></i>
                        </div>
                        <input type="text" label="dni" placeholder="DNI">
                        <input type="text" label="categoria" placeholder="Categoria">
                        <input type="text" label="nombre" placeholder="Nombres">
                        <input type="text" label="apellido" placeholder="Apellidos">
                        <input type="text" label="celular" placeholder="Celular">
                    </div>
                </div>
            </div>
        </div>

        <?php require_once "views/footer.php"; ?>

    </div>
</body>
<html>