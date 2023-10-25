<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Registrar Empleado</title>
    <link rel="icon" href="../../Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="formRegistrarEmpleado.css">
</head>

<body>
    <div class="registrar-e">

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
                <h2 class="titulo-1">Registro de</h2>
                <h2 class="titulo-2">Empleados</h2>
            </div>

            <div class="caja-empleado">

                <h3 class="subtitulo-empleado">Datos Generales</h3>

                <div class="contenedor-empleado">

                    <img src="../../Img/Empleado.png" class="imagen-foto">
                    <input type="text"  name="dni" placeholder="DNI">
                    <input type="text"  name="nombre" placeholder="Nombres">
                    <input type="text"  name="apellido" placeholder="Apellidos">
                    <input type="text"  name="celular" placeholder="N° Celular">
                    <select>
                        <option value="">Seleccione la Categoria</option>
                        <option value="asesor">Asesor</option>
                        <option value="tecnico">Técnico</option>
                        <!-- Seguir con opciones -->
                    </select>

                    <button class="boton">Registrar
                        <i class="mdi mdi-account-badge"></i>
                    </button>

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
                                <th>Seleccionar</th>
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
                                    <button class="boton-tabla">
                                     <i class="mdi mdi-eye-arrow-left"></i> 
                                    </button>
                                </td>
                            </tr>
                            <!-- Agregar más filas -->
                        </tbody>
                    </table>
                </div>

                <div class="contenedor-credenciales">

                    <h3 class="subtitulo-lista1">Credenciales</h3>

                    <div class="campo">
                        <input type="text" placeholder="DNI" name="dni">
                    </div>
                    <div class="campo">
                        <input type="text" placeholder="Usuario" name="usuario">
                    </div>
                    <div class="campo">
                        <input type="password" placeholder="Contraseña" name="contraseña">
                    </div>

                    <button class="boton-credencial">Agregar credenciales
                        <i class="mdi mdi-account-credit-card"></i>
                    </button>

                </div>

                <button class="boton-opciones">Actualizar 
                    <i class="mdi mdi-book-plus"></i>
                </button>
                <button class="boton-opciones">Atras
                        <i class="mdi mdi-keyboard-backspace"></i>
                </button>
                <button class="boton-opciones">Limpiar 
                   <i class="mdi mdi-restore"></i>
                </button>
            </div>

        </div>

        <div class="pie-pagina">
            <p>&copy; 2023 KALLPA. Todos los derechos reservados.</p>
        </div>

    </div>
</body>

</html>