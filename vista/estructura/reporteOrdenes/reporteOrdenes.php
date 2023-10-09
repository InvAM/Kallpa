<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Contrato</title>
    <link rel="stylesheet" href="../../estilos/reporteOrdenesStyle/reporteOrdenes.css">
</head>

<body>
    <div class="report-o">
        <header class="app-bar">
            <div class="toolbar-title">
                <img src="../../../Img/Kallpa.png" alt="Kallpa" class="kallpa-image">
            </div>
            <div class="spacer"></div>
            <img src="../../../Img/usuario (3).png" alt="Usuario" class="user-image">
        </header>



        <div style="margin-top: 28px">
            <h1 class="text-center titulo">
                <span style="color: #32cc32">REPORTE</span>
                <span style="color: #203864"> - ORDENES</span>
            </h1>
        </div>

        <div class="floating-rectangle">
            <h2 class="texto-area">
                <span class="texto-area1">Reporte de</span>
                <span class="texto-area2">Ordenes</span>
            </h2>

            <textarea id="reporteContratos" class="txtarea" disabled></textarea>
        </div>

        <div class="filtros">
            <h2 class="text-filtro">Filtros</h2>

            <div>
                <h2 class="texto-center">Fecha</h2>
                <div class="date-picker">
                    <!-- Inserta aquí tus date pickers -->
                </div>

            </div>



            <div>
                <button onclick="generarReporte()" class="btn-generar">Generar Reporte</button>
                <button onclick="atras()" class="btn-atras">Atras</button>
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


                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
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
        <footer class="footer">
            <div class="text-footer">
                &copy; 2023 KALLPA. Todos los derechos reservados.
            </div>
        </footer>
    </div>

</body>

</html>