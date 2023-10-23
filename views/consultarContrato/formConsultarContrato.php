<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Contrato</title>
    <link rel="stylesheet" href="public/css/formConsultarContrato.css">
</head>

<body>
    <div class="consultar-co">

        <?php require_once "views/header.php"; ?>

        <div class="contenedor-principal">

            <div class="titulo">
                <h2 class="titulo-1">Visualización de</h2>
                <h2 class="titulo-2">Consolidado de Contratos</h2>
            </div>

            <div class="parte-izq">
                <h3 class="subtitulo-lista">Contratos</h3>

                <div class="tabla">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DNI Cliente</th>
                                <th>DNI Empleado</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Número de Suministro</th>
                                <th>Seleccionar</th>
                                <th>Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1234567</td>
                                <td>71341958</td>
                                <td>72231457</td>
                                <td>Aprobado</td>
                                <td>14-09-2023</td>
                                <td>12</td>
                                <td>
                                    <button class="boton">Seleccionar</button>
                                </td>
                                <td>
                                    <button class="boton">xxxxx</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="boton-opciones1">Orden de Instalación</button>
                <button class="boton-opciones1">Atras</button>
                <button class="boton-opciones">Orden de Instalación</button>
                <button class="boton-opciones">Orden de Habilitación</button>
            </div>



            <div class="contenedor-info">
                <h3 class="subtitulo-lista">Datos del Contrato</h3>
                <div class="contenedor">
                    <p>IdContrato</p>
                    <input type="text" label="IDContrato" placeholder="Escribir...">
                    <p>Fecha</p>
                    <input type="text" label="Fecha" placeholder="Escribir...">
                    <p>Número de Suministro</p>
                    <input type="text" label="NumerodeSuministro" placeholder="Escribir...">
                    <p>Estado</p>
                    <input type="text" label="Estado" placeholder="Escribir...">
                    <p>Número de Radicando</p>
                    <input type="text" label="NumerodeRadicando" placeholder="Escribir...">
                </div>
            </div>
        </div>

        <?php require_once "views/footer.php"; ?>

    </div>

</body>

</html>