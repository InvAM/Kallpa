<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registrar Empleado</title>
    <link rel="stylesheet" href="../../estilos/RegistrarEmpleadoEstyle/formRegistrarEmpleado.css">
</head>

<body>
    <div class="registrar-e">

        <div class="cabecera">
            <div>
                <img src="../../../Img/Kallpa.png" class="imagen-kallpa">
            </div>
            <div>
                <img src="../../../Img/usuario (3).png" class="imagen-usuario">
            </div>
        </div>

        <div class="contenedor-principal">

            <div class="titulo">
                <h2 class="titulo-1">Registro de</h2>
                <h2 class="titulo-2">Empleados</h2>
            </div>

            <div class="caja-empleado">

                <h3 class="subtitulo-empleado">Datos Generales</h3>

                <div class="contenedor-empleado">

                    <img src="../../../Img/perfil.png" class="imagen-foto">

                    <p>Dni</p>
                    <input type="text" label="DNI" placeholder="Escribir...">
                    <p>Nombres</p>
                    <input type="text" label="Nombre" placeholder="Escribir...">
                    <p>Apellidos</p>
                    <input type="text" label="Apellido" placeholder="Escribir...">
                    <p>Celular</p>
                    <input type="text" label="Celular" placeholder="Escribir...">
                    <p>Categoría</p>

                    <select>
                    <option value="">Escoger...</option>
                    <option value="asesor">Asesor</option>
                    <option value="tecnico">Técnico</option>
                    <!-- Seguir con opciones -->
                    </select>

                    <button class="boton">Registrar</button>

                </div>

            </div>
            
            <div class="parte-derecha">

                <h3 class="subtitulo-lista">Lista de Empleados</h3>

                <div class="tabla">
                    <table>
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Categoría</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Celular</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>71341958</td>
                                <td>Asesor</td>
                                <td>Paolo Ignacio</td>
                                <td>Chavez Paredes</td>
                                <td>964991291</td>
                                <td>
                                <button class="boton">Seleccionar</button>
                                </td>
                            </tr>
                                <!-- Agregar más filas -->
                        </tbody>
                    </table>
                </div>

                <div class="contenedor-credenciales">

                    <h3 class="subtitulo-lista">Credenciales</h3>

                    <div class="campo">
                    <p>Dni</p>
                    <input type="text" label="DNI" placeholder="Escribir...">
                    </div>
                    <div class="campo">
                    <p>Usuario</p>
                    <input type="text" label="Usuario" placeholder="Escribir...">
                    </div>
                    <div class="campo">
                    <p>Contraseña</p>
                    <input type="password" label="Contraseña" placeholder="Escribir...">
                    </div>

                    <button class="boton-credencial">Agregar credenciales</button>

                </div>

                <button class="boton-opciones">Actualizar</button>
                <button class="boton-opciones">Atras</button>
                <button class="boton-opciones">Limpiar</button>
            </div>

        </div>

        <div class="pie-pagina">
            <p>&copy; 2023 KALLPA. Todos los derechos reservados.</p>
        </div>

    </div>
</body>

</html>