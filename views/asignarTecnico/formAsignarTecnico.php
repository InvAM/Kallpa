<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Asignar Técnico</title>
    <link rel="stylesheet" href="public/css/formAsignarTecnico.css">
</head>

<body>
<form method="POST" action="<?php echo constant('URL'); ?>tecnico">  
   
    <div class="asignar-T">
        <?php require_once "views/header.php"; ?>

        <div class="contenedorPT">
            <div class="tituloP">
                <h2 class="titulo-A">Asignar </h2>
                <h2 class="titulo-B">Técnico</h2>
            </div>
            <div class="contenedorP2">
                <div class="contenedorS1">
                    <p><strong>Técnicos</strong></p>
                    <div class="tabla-T">
                        <table class="custom-table-T">
                            <thead>
                                <tr>
                                    <th>DNI</th>
                                    <th>Categoria</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Celular</th>
                                    <th>Seleccionar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once 'models/empleado.php';
                                foreach ($this->empleado as $row) {
                                    $empleado = new Empleado();
                                    $empleado = $row; ?>
                                    <input type="hidden" name="DNI_Em" value="<?php echo $empleado->DNI_Em; ?>">
                                    <input type="hidden" name="IDCategoria" value="<?php echo $empleado->IDCategoria; ?>">
                                    <input type="hidden" name="Nombre_Em" value="<?php echo $empleado->Nombre_Em; ?>">
                                    <input type="hidden" name="Apellido_Em" value="<?php echo $empleado->Apellido_Em; ?>">
                                    <input type="hidden" name="Celular_Em" value="<?php echo $empleado->Celular_Em; ?>">
                                    <tr>
                                        <td><?php echo $empleado->DNI_Em ?></td>
                                        <td><?php echo $empleado->IDCategoria ?></td>
                                        <td><?php echo $empleado->Nombre_Em ?></td>
                                        <td><?php echo $empleado->Apellido_Em ?></td>
                                        <td><?php echo $empleado->Celular_Em ?></td>
                                        <td>
                                            <button class="boton-seleccionar boton" type="submit" name="accion" value="seleccionar">
                                                <i class="mdi mdi-content-copy mx-1"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <button class="boton-opciones-T" type="submit" name="accion" value="limpiar"> Limpiar
                        <i class="mdi mdi-restore"></i></button>
                    <button class="boton-opciones-T"  type="submit" name="accion" value="volver"> Atras
                        <i class="mdi mdi-keyboard-backspace"></i></button>
                    <button class="boton-especial"  type="submit" name="accion" value="asignar"> Asignar Técnico
                        <i class="mdi mdi-arrow-right-drop-circle"></i></button>
                </div>
                <div class="contenedorS2">
                    <div class="CajaTécnico">
                        <p class="TI2">Datos del Técnico</p>
                        <div class="imagenT">
                            <i class="mdi mdi-account-hard-hat"></i>
                        </div>
                        <input type="text" id="dni" name="DNI_Em" placeholder="DNI" 
                               value="">
                        <input type="text" id="categoria" name="IDCategoria" placeholder="Categoria" 
                               value="" >
                        <input type="text" id="nombre" name="Nombre_Em" placeholder="Nombres" 
                               value="" >
                        <input type="text" id="apellido" name="Apellido_Em" placeholder="Apellidos" 
                               value="" >
                        <input type="text" id="celular" name="Celular_Em" placeholder="Celular" 
                               value="" >
                    </div>
                </div>
            </div>
        </div>

        <?php require_once "views/footer.php"; ?>
    </div>
</form>
</body>
<html>
    
