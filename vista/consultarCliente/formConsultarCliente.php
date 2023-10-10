<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formConsultarCliente.css">
    <title>Consultar Cliente</title>
    <link rel="icon" href="../../Img/WhatsApp Image 2023-10-08 at 12.16.04 PM.jpeg" type="image/x-icon">
</head>

<body>
    <div class="consultar-cliente">

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
                <h2 class="titulo-1">Consultar</h2>
                <h2 class="titulo-2">Cliente</h2>
            </div>
            <div class="search-container">
                <div class="linea-1">
                    <input type="text" class="input-field" id="IDCliente" placeholder="ID Cliente">
                    <input type="text" class="input-field" id="NombreClie" placeholder="Nombre del Cliente">
                    <input type="text" class="input-field" id="ApellidoClie" placeholder="Apellido del Cliente">
                    <input type="text" class="input-field" id="NumeroCel" placeholder="N° Celular">
                    <label class="label-styled" for="FechadeNacimiento">Fecha de Nacimiento</label>
                    <input type="date" id="Fecha de Nacimiento">
                </div>
                <div class="linea-2">
                    <select class="input-field" id="Genero" placeholder="Seleccione el Genero">
                        <option value="" disabled selected hidden>Seleccione el Genero</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                    <select class="input-field" id="Nacionalidad" placeholder="Seleccione su pais de origen">
                        <option value="" disabled selected hidden>Seleccione su pais de origen</option>
                        <option value="Antigua y Barbuda">Antigua y Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Bahamas">Bahamas</option>
                        <option value="Barbados">Barbados</option>
                        <option value="Belice">Belice</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="Brasil">Brasil</option>
                        <option value="Canadá">Canadá</option>
                        <option value="Chile">Chile</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Costa Rica">Costa Rica</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Dominica">Dominica</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="El Salvador">El Salvador</option>
                        <option value="Estados Unidos">Estados Unidos</option>
                        <option value="Granada">Granada</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haití">Haití</option>
                        <option value="Honduras">Honduras</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="México">México</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Panamá">Panamá</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Perú">Perú</option>
                        <option value="República Dominicana">República Dominicana</option>
                        <option value="San Cristóbal y Nieves">San Cristóbal y Nieves</option>
                        <option value="Santa Lucía">Santa Lucía</option>
                        <option value="San Vicente y las Granadinas">San Vicente y las Granadinas</option>
                        <option value="Surinam">Surinam</option>
                        <option value="Trinidad y Tobago">Trinidad y Tobago</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Venezuela">Venezuela</option>
                    </select>
                    </select>
                    <select class="input-field" id="EstadoCivil" placeholder="Seleccione Estado Civil">
                        <option value="" disabled selected hidden>Seleccione Estado Civil</option>
                        <option value="Soltero">Soltero</option>
                        <option value="Casado">Casado</option>
                        <option value="Divorciado">Divorciado</option>
                        <option value="Viudo">Viudo</option>
                    </select>
                    <input type="text" class="input-field" id="IDDomicilio" placeholder="ID Domicilio">
                </div>
                <div class="botones-derecha">
                    <div class="fila-botones">
                        <button class="boton">Habilitar Actualizacion</button>
                        <button class="boton">Limpiar</button>
                    </div>
                    <div class="fila-botones">
                        <button class="boton">Registrar Actualizacion</button>
                        <button class="boton">Salir</button>
                    </div>
                </div>
            </div>
            <div class="table-container">
                <input type="text" id="buscador" placeholder="Buscar contrato por ID">

                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID Cliente</th>
                            <th>Nombre del Cliente</th>
                            <th>Apellido del Cliente</th>
                            <th>N° Celular</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Genero</th>
                            <th>Nacionalidad</th>
                            <th>Estado Civil</th>
                            <th>ID Domicilio</th>
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


        </div>

</body>

</html>