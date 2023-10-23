<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Contrato</title>
    <link rel="stylesheet" href="public/css/reporteContrato.css">
</head>

<body>
    <div class="report-c">

        <?php require_once "views/header.php"; ?>
        <div>
            <h1 class="text-center">
                <span>REPORTE</span>
                <span class="span-contrato"> - CONTRATO</span>
            </h1>
        </div>

        <div class="floating-rectangle">
            <h2 class="texto-area">
                <span class="texto-area1">Reporte de</span>
                <span class="texto-area2">Contrato</span>
            </h2>

            <textarea id="reporteContratos" class="txtarea" disabled></textarea>
        </div>
        <div class="contenedor-cajas-F ">
            <h2 class="texto-center">Fecha</h2>
            <div class="date-picker">
                <!-- Inserta aquí tus date pickers -->
            </div>
        </div>

        <div class="filtros">
            <h2>Filtros</h2>

            <div>
                <form action="" method="post">
                    <fieldset class="estadoC">
                        <legend>Estado Contrato</legend>
                        <select name="estado_contrato" id="estadoC" class="cbxEstado">
                            <option value="revisado">Revisado</option>
                            <option value="pendiente">Pendiente</option>
                        </select>
                    </fieldset>
                    <fieldset class="asesor">
                        <legend>Asesor</legend>
                        <select name="asesor" id="asesor" class="cbxAsesor">
                            <option value="asesores">Freddy</option>
                        </select>
                    </fieldset>
                </form>
            </div>
            <div>
                <button class="btn-generar">Generar Reporte</button>
                <button class="btn-atras">Atras</button>
            </div>
        </div>
        <div class="tabla">
            <h2 class="titulo-tabla">Lista de Reporte de Contratos </h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Contrato</th>
                        <th>Fecha Contrato</th>
                        <th>N° Radicado</th>
                        <th>Punto Instalacion</th>
                        <th>Estado</th>
                        <th>DNI Cliente</th>
                        <th>DNI Empleado</th>
                        <th>Categoria Gabinete</th>
                        <th>Tipo Instalacion</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <button class="boton">Seleccionar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <?php require_once "views/footer.php"; ?>
    </div>
</body>

</html>