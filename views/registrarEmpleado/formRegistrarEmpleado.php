<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Registrar Empleado</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/formRegistrarEmpleado.css">
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
                    autocomplete="off" class="" id="formularioE">
                    <h3 class="subtitulo-empleado">Datos Generales</h3>
                    <div class="contenedor-empleado">
                        <div class="imag-especial"> 
                        <i class="mdi mdi-account-tie "></i>
                        </div>
                        <label for="DNI_Em_reg">Dni</label>
                        <input type="text" label="DNI" placeholder="DNI" name="DNI_Em_reg" id="DNI_Em_reg">
                        <label for="Nombre_Em_reg">Nombres</label>
                        <input type="text" label="Nombre" placeholder="Nombres" name="Nombre_Em_reg"
                            id="Nombre_Em_reg">
                        <label for="Apellido_Em_reg">Apellidos</label>
                        <input type="text" label="Apellido" placeholder="Apellidos" name="Apellido_Em_reg"
                            id="Apellido_Em_reg">
                        <label for="Celular_Em_reg">Celular</label>
                        <input type="text" label="Celular" placeholder="Celular" name="Celular_Em_reg"
                            id="Celular_Em_reg">
                        <label for="IDCategoria_reg">Categoría</label>
                        <select name="IDCategoria_reg" id="IDCategoria_reg">
                            <?php
                            include_once 'models/categoriaempleado.php';
                            foreach ($this->categorias as $opcion) {
                                $categoria = new CategoriaEmpleado();
                                $categoria = $opcion; ?>
                                <option value="<?php echo $opcion->IDCategoria;?>">
                                    <?php echo $opcion->Cargo_CE; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <input type="submit" class="boton" value="Registrar">
                        <button type="button" class="boton" id="btnActualizar">
                        <i class="mdi mdi-pencil"></i>Actualizar</button>
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
                            foreach ($this->empleado as $row) {
                                $empleado = new Empleado();
                                $empleado = $row; ?>
                                <tr>
                                    <td>
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
                                        <a
                                            href="<?php echo constant('URL') . 'registrarEmpleado/eliminarEmpleado/' . $empleado->DNI_Em; ?>"><button
                                                class="boton-seleccionar boton"><i class="mdi mdi-delete-empty"></i></button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="contenedor-credenciales">
                    <form action="" class="FormularioAjax">
                        <h3 class="subtitulo-lista-c">Credenciales</h3>
                        
                        <div class="campo">
                            <label for="DNI_Em_cre">Dni</label>
                            <input type="text" label="DNI" placeholder="Ingrese el DNI" name="DNI_Em_cre" id="DNI_Em_cre"
                                required>
                        </div>
                        <div class="campo">
                            <label for="username">Usuario</label>
                            <input type="text" label="Usuario" placeholder="Ingrese el usuario" name="username" id="username"
                                required>
                        </div>
                        <div class="campo">
                            <label for="password">Contraseña</label>
                            <input type="password" label="Contraseña" placeholder="Ingrese la contraseña" required name="password"
                                id="password">
                        </div>
                        <input type="hidden" name="accion2" value="add" />

                        <input type="submit" value="Agregar Credenciales" class="boton-credencial">
                    </form>
                </div>
                <button class="boton-opciones" name="btnLimpiar" id="btnLimpiar">
                   <i class="mdi mdi-restore"></i>Limpiar</button>
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