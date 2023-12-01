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
                                    <tr>
                                        <td>
                                            <?php echo $empleado->DNI_Em ?>
                                        </td>
                                        <td>
                                            <?php echo $empleado->IDCategoria ?>
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
                                            <button class="boton-seleccionar boton" id="btnSeleccionar"
                                                 data-dni="<?php echo $empleado->DNI_Em; ?>"
                                                 data-nombre="<?php echo $empleado->Nombre_Em; ?>"
                                                 data-apellido="<?php echo $empleado->Apellido_Em; ?>"
                                                 data-celular="<?php echo $empleado->Celular_Em; ?>"
                                                 data-categoria="<?php echo $empleado->IDCategoria; ?>">
                                                <i class="mdi mdi-content-copy mx-1"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <button class="boton-opciones-T" id="btnlimpiar">
                                                 Limpiar <i class="mdi mdi-restore"></i>
                    </button>
                   <button class="boton-opciones-T" id="btnAtras"> Atras
                        <i class="mdi mdi-keyboard-backspace"></i>
                    </button>
                    <button class="boton-especial" id="btnAsignar" type="submit"> Asignar Técnico
                        <i class="mdi mdi-arrow-right-drop-circle"></i></button>
                </div>
            
                
                <div class="contenedorS2">
                <form method="POST" action="<?php echo constant('URL'); ?>tecnico" autocomplete="off" class="" id="formularioT">  
     
                 <div class="CajaTécnico">
                        <p class="TI2">Datos del Técnico</p>
                        <div class="imagenT">
                            <i class="mdi mdi-account-hard-hat"></i>
                        </div>
                        <label class="Sub" for="DNI_Em_T">Dni</label>
                        <input type="text" id="DNI_Em_T" name="DNI_Em_T" placeholder="DNI" 
                               value=""readonly>
                        <label class="Sub" for="IDCategoria_T">IDCategoria</label>
                        <input type="text" id="IDCategoria_T" name="IDCategoria_T" placeholder="Categoria" 
                               value="" readonly>
                        <label class="Sub"  for="Nombre_Em_T">Nombres</label>
                        <input type="text" id="Nombre_Em_T" name="Nombre_Em_T" placeholder="Nombres" 
                               value="" readonly>
                        <label class="Sub"  for="Apellido_Em_T">Apellidos</label>
                        <input type="text" id="Apellido_Em_T" name="Apellido_Em_T" placeholder="Apellidos" 
                               value="" readonly>
                        <label class="Sub"  for="Celular_Em_T">Teléfono de Contacto</label>
                        <input type="text" id="Celular_Em_T" name="Celular_Em_T" placeholder="Celular" 
                               value="" readonly>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <?php require_once "views/footer.php"; ?>
    </div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?php echo constant('URL'); ?>public/js/asignarTecnico.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
<html>
    
