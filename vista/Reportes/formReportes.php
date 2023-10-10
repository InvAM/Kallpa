<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="stylesheet" href="formReportes.css">
</head>

<body>
    <div class="reportes">

        <div class="cabecera">
            <div>
                <img src="../../Img/Kallpa.png" class="imagen-kallpa">
            </div>
            <div>
                <img src="../../Img/usuario (3).png" class="imagen-usuario">
            </div>
        </div>

        <div class="contenedor-principal">

            <div class="titulo">
                <h2 class="titulo-1">Reporte -</h2>
                <h2 class="titulo-2">General</h2>
            </div>

            <!--CONTENEDOR - CALENDARIO -->
            <div class="contenedor-graficos">

                <div style="margin-top: 24px; margin-left: 10px; display: flex;">
                    <input type="date" class="custom-date-picker" style="margin-right: 20px; flex: 1;">
                    <input type="date" class="custom-date-picker" style="flex: 1;">
                </div>

            </div><br><br>

            <div class="tabla">
                <table>
                    <thead>
                        <tr>
                            <th>ID Contrato</th>
                            <th>Fecha</th>
                            <th>Número Radicado</th>
                            <th>Número Suministro</th>
                            <th>Punto de Instalación</th>
                            <th>Estado</th>
                            <th>Categoría Gabinete</th>
                            <th>Tipo Instalación</th>
                            <th>DNI Cliente</th>
                            <th>DNI Empleado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CONT0001</td>
                            <td>14-09-2023</td>
                            <td>12345</td>
                            <td>43245</td>
                            <td>Point1</td>
                            <td>Aprobado</td>
                            <td>ZZZZZ</td>
                            <td>XXXX</td>
                            <td>1234567</td>
                            <td>71341958</td>
                        </tr>
                    </tbody>
                </table>
            </div><br><br><br><br>
            <button class="boton-opciones">GENERAR REPORTE</button>
            <button class="boton-opciones">REPORTE CONTRATOS</button>
            <button class="boton-opciones">REPORTE CLIENTES</button>
            <button class="boton-opciones">REPORTE ORDENES</button>
            <button class="boton-opciones">ATRAS</button>

        </div>


        <div class="pie-pagina">
            <p>&copy; 2023 KALLPA. Todos los derechos reservados.</p>
        </div>

    </div>

</body>

</html>