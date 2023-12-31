<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
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
                <form method="POST" autocomplete="off" class="formularioE" id="formularioE">
                    <h3 class="subtitulo-empleado">Datos Generales</h3>
                    <div class="contenedor-empleado">
                        <i class="mdi mdi-account-tie"></i>
                        <br>
                        <label for="DNI_Em">Dni</label>
                        <input type="text" label="DNI" placeholder="Ingrese el DNI" name="DNI_Em" id="DNI_Em">
                        <label for="Nombre_Em">Nombres</label>
                        <input type="text" label="Nombre" placeholder="Ingrese los nombres" name="Nombre_Em"
                            id="Nombre_Em">
                        <label for="Apellido_Em">Apellidos</label>
                        <input type="text" label="Apellido" placeholder="Ingrese los apellidos" name="Apellido_Em"
                            id="Apellido_Em">
                        <label for="Celular_Em">Celular</label>
                        <input type="text" label="Celular" placeholder="Ingrese el N° de celular" name="Celular_Em"
                            id="Celular_Em">
                        <label for="IDCategoria">Categoría</label>
                        <select name="IDCategoria" id="IDCategoria">
                            <?php
                            include_once "models/categoriaempleado.php";
                            foreach($this->categoria as $opcion) {
                                $categoria = new Categoriaempleado();
                                $categoria = $opcion; ?>
                                <option value="<?php echo $opcion->IDCategoria ?>" ;>
                                    <?php echo $opcion->Cargo_CE ?>
                                </option>
                            <?php } ?>

                            <!-- Seguir con opciones -->
                        </select>
                        <div class="botones">
                            <button type="button" class="boton" id="btnRegistrar">
                                <i class="mdi mdi-plus-box"></i>Registrar</button>

                            <button type="button" class="boton" id="btnActualizar">
                                <i class="mdi mdi-update"></i>Actualizar</button>
                        </div>
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
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Celular</th>
                                <th>Categoría</th>
                                <th>Seleccionar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once 'models/empleado.php';
                            foreach($this->empleado as $row) {
                                $empleado = new Empleado();
                                $empleado = $row; ?>
                                <tr>
                                    <td class="dniColumn">
                                        <?php echo $empleado->DNI_Em ?>
                                    </td>
                                    <td>
                                        <?php echo $empleado->Nombre_Em ?>
                                    </td>
                                    <td>
                                        <?php echo $empleado->Apellido_Em ?>
                                    </td>
                                    <td>
                                        <?php echo $empleado->Celular_Em ?>
                                    </td>
                                    <td>
                                        <?php echo $empleado->IDCategoria ?>
                                    </td>
                                    <td>
                                        <button class="boton-seleccionar boton" data-dni="<?php echo $empleado->DNI_Em; ?>"
                                            data-nombre="<?php echo $empleado->Nombre_Em; ?>"
                                            data-apellido="<?php echo $empleado->Apellido_Em; ?>"
                                            data-celular="<?php echo $empleado->Celular_Em; ?>"
                                            data-categoria="<?php echo $empleado->IDCategoria; ?>">
                                            <i class="mdi mdi-content-copy mx-1"></i></button>

                                    </td>
                                    <td>
                                        <button class="boton-seleccionar boton btnEliminar" id="btnEliminar">
                                            <i class="mdi mdi-delete-empty"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="contenedor-credenciales">
                    <form action="" class="FormularioAjax">
                        <h3 class="subtitulo-lista-c">Credenciales</h3>

                        <form method="POST" class="FormularioAjax">
                            <div class="campo">
                                <label for="DNI_Em_c">Dni</label>
                                <input type="text" label="DNI" placeholder="DNI" name="DNI_Em_c" id="DNI_Em_c" required>
                            </div>
                            <div class="campo">
                                <label for="nombreusuario">Usuario</label>
                                <input type="text" label="Usuario" placeholder="Escribir..." name="nombreusuario"
                                    id="nombreusuario" required>
                            </div>
                            <div class="campo">
                                <label for="password">Contraseña</label>
                                <input type="password" label="Contraseña" placeholder="Ingrese la contraseña" required
                                    name="password" id="password">
                            </div>

                            <button id="btnRegistrarCredenciales" class="boton-credencial">
                                <i class="mdi mdi-key-plus"></i>
                                Agregar Credenciales</button>
                        </form>
                </div>

                <button class="boton-opciones" name="btnAtras" id="btnAtras">
                    <i class="mdi mdi-keyboard-backspace"></i>Atras</button>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>
        </div>



        <?php require_once "views/footer.php"; ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>public/js/registrarEmpleado.js"></script>
</body>

</html>