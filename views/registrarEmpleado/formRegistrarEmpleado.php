<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registrar Empleado</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/formRegistrarEmpleado.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.all.min.js"></script>

</head>

<body>
    <div class="registrar-e">
        <?php require_once "views/header.php"; ?>

        <div class="contenedor-principal">

            <div class="titulo">
                <h2 class="titulo-1">Registro de</h2>
                <h2 class="titulo-2">Empleados</h2>
            </div>

            <div class="caja-empleado">
                <form action="<?php echo constant('URL'); ?>registrarEmpleado/registrarNuevoEmpleado" method="POST"
                    autocomplete="off" class="">
                    <h3 class="subtitulo-empleado">Datos Generales</h3>

                    <div class="contenedor-empleado">

                        <img src="<?php echo constant('URL'); ?>public/Img/perfil.png" class="imagen-foto">

                        <label for="DNI_Em_reg">Dni</label>
                        <input type="text" label="DNI" placeholder="Escribir..." name="DNI_Em_reg" id="DNI_Em_reg">
                        <label for="Nombre_Em_reg">Nombres</label>
                        <input type="text" label="Nombre" placeholder="Escribir..." name="Nombre_Em_reg"
                            id="Nombre_Em_reg">
                        <label for="Apellido_Em_reg">Apellidos</label>
                        <input type="text" label="Apellido" placeholder="Escribir..." name="Apellido_Em_reg"
                            id="Apellido_Em_reg">
                        <label for="Celular_Em_reg">Celular</label>
                        <input type="text" label="Celular" placeholder="Escribir..." name="Celular_Em_reg"
                            id="Celular_Em_reg">
                        <label for="IDCategoria_reg">Categoría</label>

                        <select name="IDCategoria_reg" id="IDCategoria_reg">
                            <option value="0">Escoger...</option>
                            <option value="1">Asesor</option>
                            <option value="2">Técnico</option>
                            <!-- Seguir con opciones -->
                        </select>
                        <input type="hidden" name="accion1" value="add" />
                        <input type="submit" class="boton" value="Registrar">

                    </div>
                </form>
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="boton">Seleccionar</button>
                                </td>
                            </tr>
                            <!-- Agregar más filas -->
                        </tbody>
                    </table>
                </div>

                <div class="contenedor-credenciales">
                    <form action="" class="FormularioAjax">
                        <h3 class="subtitulo-lista">Credenciales</h3>

                        <div class="campo">
                            <label for="DNI_Em_cre">Dni</label>
                            <input type="text" label="DNI" placeholder="Escribir..." name="DNI_Em_cre" id="DNI_Em_cre"
                                required>
                        </div>
                        <div class="campo">
                            <label for="username">Usuario</label>
                            <input type="text" label="Usuario" placeholder="Escribir..." name="username" id="username"
                                required>
                        </div>
                        <div class="campo">
                            <label for="password">Contraseña</label>
                            <input type="password" label="Contraseña" placeholder="Escribir..." required name="password"
                                id="passwor">
                        </div>
                        <input type="hidden" name="accion2" value="add" />

                        <input type="submit" value="Agregar Credenciales" class="boton-credencial">
                    </form>
                </div>

                <button class="boton-opciones">Actualizar</button>
                <button class="boton-opciones">Atras</button>
                <button class="boton-opciones">Limpiar</button>
            </div>

        </div>


        <?php require_once "views/footer.php"; ?>

    </div>
</body>


</html>