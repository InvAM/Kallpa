<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Clientes</title>
    <link rel="stylesheet" href="../../estilos/reporteClienteStyle/reporteCliente.css">

</head>

<body>
    <div class="report-cli">
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
                <span style="color: #203864"> - CLIENTES</span>
            </h1>
        </div>

        <div class="floating-rectangle">
            <h2 class="texto-area">
                <span class="texto-area1">Reporte de</span>
                <span class="texto-area2">Clientes</span>
            </h2>

            <textarea id="reporteClientes" class="txtarea" disabled></textarea>
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
                    <fieldset class="distrito">
                        <legend>Distrito</legend>
                        <select name="distrito" id="distrito" class="cbxDistrito">
                            <option value="LOL">Los Olivos</option>
                            <option value="COM">Comas</option>
                        </select>
                    </fieldset>
                    <fieldset class="estrato">
                        <legend>Estrato</legend>
                        <select name="estrato" id="estrato" class="cbxEstrato">
                            <option value="asesores">Medio</option>
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
            <h2 class="titulo-tabla">Lista de Reporte de Clientes </h2>
            <table>
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Genero</th>
                        <th>Nacionalidad</th>
                        <th>Estado Civil</th>
                        <th>Celular</th>
                        <th>ID Domicilio</th>
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
        <footer class="footer">
            <div class="text-footer">
                &copy; 2023 KALLPA. Todos los derechos reservados.
            </div>
        </footer>

    </div>
</body>

</html>