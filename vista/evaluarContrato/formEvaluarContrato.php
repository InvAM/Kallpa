<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formEvaluarContrato.css">
    <title>Evaluar Contrato</title>
    <link rel="icon" href="../../Img/WhatsApp Image 2023-10-08 at 12.16.04 PM.jpeg" type="image/x-icon">
</head>

<body>
    <div class="evaluar-c">

        <div class="cabecera">
            <div>
                <img src="../../Img/Kallpa.png" class="imagen-kallpa">
            </div>

            <div>
                <img src="../../Img/usuario (3).png" class="imagen-usuario">
            </div>
        </div>
        <div class="pie-pagina">
            <p>&copy; 2023 KALLPA. Todos los derechos reservados.</p>
        </div>
        <div class="contenedor-principal">

            <div class="titulo">
                <h2 class="titulo-1">Evaluar </h2>
                <h2 class="titulo-2"> Contratos</h2>
            </div>

            <div class="search-container">
                <input type="text" class="input-field" id="searchID" placeholder="Buscar por ID">
                <select class="input-field" id="searchEstado" placeholder="Estados">
                    <option value="">En revisión</option>
                    <option value="">Observado</option>
                    <option value="">Aprobado</option>
                    <option value="">Desaprobado</option>
                    <!-- Opciones de estados se cargarán dinámicamente aquí -->
                </select>
                <label class="label-styled" for="searchFecha">Selecciona una fecha:</label>
                <input type="date" id="searchFecha">

            </div>
            <div class="table-container">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID Contrato</th>
                            <th>Fecha Contrato</th>
                            <th>Número Radicado</th>
                            <th>Número Suministro</th>
                            <th>Punto Instalación</th>
                            <th>Estado</th>
                            <th>ID Gabinete Categoría</th>
                            <th>ID Tipo Instalación</th>
                            <th>DNI Cliente</th>
                            <th>DNI Empleado</th>
                            <th>Seleccionar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2023-10-07</td>
                            <td>12345</td>
                            <td>67890</td>
                            <td>Ejemplo 1</td>
                            <td>Activo</td>
                            <td>A1</td>
                            <td>Tipo 1</td>
                            <td>12345678</td>
                            <td>87654321</td>
                            <td>
                                <button class="action-button select-button"
                                    @click="seleccionarContrato(item)">Selecionar</button>

                            </td>
                        </tr>
                        <!-- Los datos de la tabla se cargarán dinámicamente aquí -->
                    </tbody>
                </table>
            </div>


            <div class="contract-details">
                <img src="../../../Img/contrato (2).png" alt="Icono de contrato" class="imagen-contrato">
                <div class="input-fields">
                    <input type="text" class="input-field" id="IDContrato" placeholder="IDContrato">
                    <input type="text" class="input-field" id="numSum" placeholder="Numero de Suministro">
                    <input type="text" class="input-field" id="DNI_cli" placeholder="DNI del Cliente">
                    <select class="input-field" id="selectedEstado">
                        <option value="">En revisión</option>
                        <option value="">Observado</option>
                        <option value="">Aprobado</option>
                        <option value="">Desaprobado</option>
                        <!-- Opciones del estado del contrato se cargarán dinámicamente aquí -->
                    </select>
                </div>
            </div>
        </div>


        <div class="buttons-container">
            <button class="action-button" id="confirmar">Actualizar Estado</button>
            <button class="action-button" id="limpiar">Limpiar Campos</button>
            <button class="action-button" id="volverMenu">Volver a Menú</button>
        </div>

        <div class="confirmation-dialog" id="dialogVisible">
            <!-- Contenido de la ventana de confirmación se generará dinámicamente aquí -->
        </div>

        <div class="error-dialog" id="dialogError">
            <!-- Contenido de la ventana de error se generará dinámicamente aquí -->
        </div>
    </div>
</body>

</html>