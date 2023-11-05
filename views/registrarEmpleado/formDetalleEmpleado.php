<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Registrar Empleado</title>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/formRegistrarEmpleado.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

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
                <form action="<?php echo constant('URL'); ?>registrarEmpleado/actualizarEmpleado" method="POST"
                    autocomplete="off" class="">
                    <h3 class="subtitulo-empleado">Datos Generales</h3>

                    <div class="contenedor-empleado">

                        <img src="<?php echo constant('URL'); ?>public/Img/perfil.png" class="imagen-foto">

                        <label for="DNI_Em_reg">Dni</label>
                        <input type="text" label="DNI" placeholder="Escribir..." name="DNI_Em_reg"
                            value="<?php echo $this->empleado->DNI_Em ?>">

                        <label for="Nombre_Em_reg">Nombres</label>
                        <input type="text" label="Nombre" placeholder="Escribir..." name="Nombre_Em_reg"
                            value="<?php echo $this->empleado->Nombre_Em ?>">

                        <label for="Apellido_Em_reg">Apellidos</label>
                        <input type="text" label="Apellido" placeholder="Escribir..." name="Apellido_Em_reg"
                            value="<?php echo $this->empleado->Apellido_Em ?>">

                        <label for="Celular_Em_reg">Celular</label>
                        <input type="text" label="Celular" placeholder="Escribir..." name="Celular_Em_reg"
                            value="<?php echo $this->empleado->Celular_Em ?>">

                        <label for="IDCategoria_reg" id="IDCategoria_reg">Categoría</label>
                        <select name="IDCategoria_reg">
                            <option value="0">Escoger...</option>
                            <option value="1" <?php if ($this->empleado->IDCategoria == 1)
                                echo "selected"; ?>>Asesor
                            </option>
                            <option value="2" <?php if ($this->empleado->IDCategoria == 2)
                                echo "selected"; ?>>Técnico
                            </option>
                            <!-- Agregar otras opciones aquí -->
                        </select>


                        <input type="submit" class="boton" value="Actualizar" id="Actualizar">

                        <a href="<?php echo constant('URL') ?>registrarEmpleado"><input type="button" class="boton"
                                value="Volver"></a>

                    </div>
                </form>
            </div>
        </div>

    </div>



    <?php require_once "views/footer.php"; ?>

    </div>

</body>


</html>