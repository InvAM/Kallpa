<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <title>Registrar Cliente</title>
    <link rel="stylesheet" href="public/css/formRegistrarCliente.css">
</head>

<body>
    <div class="registrar-cli">

        <?php require_once "views/header.php"; ?>

        <div class="contenedor-principal">

            <div class="titulo">
                <h2 class="titulo-1">Registro de</h2>
                <h2 class="titulo-2">Clientes</h2>
            </div>

            <div class="parte_izquierda">

                <h3 class="subtitulo-domicilio">Datos del domicilio</h3>

                <div class="cont-datos-domicilio">

                    <div class="posicion-letra">
                        <div class="grupo1">
                        <label for="IDDomicilio_reg">ID Domicilio</label>
                        <input type="text" label="id" placeholder="Escribir..." name="IDDomicilio_reg" id="IDDomicilio_reg">
                        <label for="Direccion_Dom_reg">Dirección</label>
                        <input type="text" label="direc" placeholder="Escribir..." name="Direccion_Dom_reg" id="Direccion_Dom_reg">
                        <label for="Interior_Dom_reg">Interior</label>
                        <input type="text" label="inte" placeholder="Escribir..." name="Interior_Dom_reg" id="Interior_Dom_reg">
                        </div>
                        <div class="grupo2">
                        <label for="Piso_Dom_reg">Piso</label>
                        <input type="text" label="piso" placeholder="Escribir..." name="Piso_Dom_reg" id="Piso_Dom_reg">
                        <label for="Nomb_Malla_Dom_reg">Nombre de Malla</label>
                        <input type="text" label="malla" placeholder="Escribir..." name="Nomb_Malla_Dom_reg" id="Nomb_Malla_Dom_reg">
                        <label for="IDCondicion_reg">Condición</label>
                        <input type="text" label="cond" placeholder="Escribir..." name="IDCondicion_reg" id="IDCondicion_reg">
                        </div>
                        <div class="grupo3">
                        <label for="IDEstrato_reg">Estrator</label>
                        <input type="text" label="estra" placeholder="Escribir..." name="IDEstrato_reg" id="IDEstrato_reg">
                        <label for="IDPredio_reg">Predio</label>
                        <input type="text" label="predio" placeholder="Escribir..." name="IDPredio_reg" id="IDPredio_reg">
                        <label for="IDDistrito_reg">Distrito</label>
                        <input type="text" label="distrito" placeholder="Escribir..." name="IDDistrito_reg" id="IDDistrito_reg">
                        </div>
                    </div>

        

                    <div class="posicion-boton">
                        <button class="boton-registrar">Registrar Domicilio</button>
                    </div>

                </div>

            </div>

            <h3 class="subtitulo-cliente">Datos del Cliente</h3>

            <div class="contenedor-datos">
                <form action="<?php echo constant('URL'); ?>registrarCliente/registrarNuevoCliente" method="POST"
                autocomplete="off" class="" id="formularioC">
                    <div class="input-todo">
                        <label for="Nombre_cli_reg">Nombre del cliente</label>
                        <input type="text" label="Nombre" placeholder="Escribir..." name="Nombre_cli_reg" id="Nombre_cli_reg">
                        <label for="Apellido_cli_reg">Apellido del Cliente</label>
                        <input type="text" label="Apellido" placeholder="Escribir..." name="Apellido_cli_reg" id="Apellido_cli_reg">
                        <label for="DNI_cli_reg">Dni del Cliente</label>
                        <input type="text" label="DNI" placeholder="Escribir... " name="DNI_cli_reg" id="DNI_cli_reg">
                        <label for="FechaNacimiento:_cli_reg">Fecha de Nacimiento</label>
                        <input type="text" label="FechaNacimiento" placeholder="Ejemplo: 2023-07-08" name="FechaNacimiento:_cli_reg" id="FechaNacimiento:_cli_reg">
                    </div>


                    <div class="datos_derecha">
                        <label for="IDGenero_reg">Género</label>
                        <select name="IDGenero_reg" id="IDGenero_reg">
                            <option value="">Escoger...</option>
                            <option value="femenino">Femenino</option>
                            <option value="masculino">Masculino</option>
                        </select>
                        <label for="Celular_cli_reg">Célular</label>                    
                        <input type="text" label="celular" placeholder="Escribir..." name= "Celular_cli_reg" id="Celular_cli_reg">
                        <label for="IDNacionalidad_reg">Nacionalidad</label>
                        <select name="IDNacionalidad_reg" id="IDNacionalidad_reg">
                            <option value="0">Escoger...</option>
                            <option value="1">Peruano</option>
                            <option value="2">Venezolano</option>
                            <!-- Seguir con opciones -->
                        </select>
                        <label for="IDEstadoCivil_reg">Estado Civil</label>
                        <select name="IDEstadoCivil_reg" id="IDEstadoCivil_reg">
                            <option value="0">Escoger...</option>
                            <option value="1">Soltero</option>
                            <option value="2">Casado</option>
                            <!-- Seguir con opciones -->
                        </select>
                    </div>

                    <div class="contenedor-botones">
                        <input type="submit" class="boton" value="Registrar">
                        <button type="button" class="boton" id="btnActualizar">Actualizar</button>
                    </div>
                </form>
            </div>

            <div class="contenedor-info">

                <div class="linea">
                    <div>
                        <img src="public/Img/Kallpa.png" class="imagen-kallpainfo">
                    </div>
                    <h3>Fecha: 07/10/2023</h3>
                </div>

                <div class="espacio">
                    <?php
                    include_once 'models/cliente.php';
                    foreach ($this->cliente as $row){
                        $cliente = new Cliente();
                        $cliente = $row; ?>
                    <h3>Datos del usuario:</h3>
                    <hr>
                    <div>
                        <h4>Nombres :<?php echo $cliente->Nombre_cli?> </h4>
                        <h4>Apellidos : <?php echo $cliente->Apellido_cli ?> </h4> 
                        <h4>DNI : <?php echo $cliente->DNI_cli ?> </h4>
                        <h4>Fecha Nacimiento : <?php echo $cliente-> FechaNacimiento_cli?> </h4>
                        <h4>Género : <?php echo $cliente->IDGenero ?> </h4>
                        <h4>Nacionalidad : <?php echo $cliente-> IDNacionalidad?> </h4>
                        <h4>Estado Civil : <?php echo $cliente-> IDEstadoCivil?> </h4>
                        <h4>Celular : <?php echo $cliente->Celular_cli ?> </h4>
                    </div>
                    <button class="boton_seleccionar boton" data-dni="<?php echo $cliente->DNI_cli; ?>"
                        data-nombre="<?php echo $cliente->Cliente_cli; ?>"
                        data-apellido="<?php echo $cliente->Apellido_cli; ?>"
                        data-fecha="<?php echo $cliente->FechaNacimiento_cli; ?>"
                        data-genero="<?php echo $cliente->IDGenero; ?>"
                        data-nacionalidad ="<?php echo $cliente->IDNacionalidad; ?>"
                        data-estado = "<?php echo $cliente->IDEstadoCivil; ?>"
                        data-celular= "<?php echo $cliente->Celular_cli; ?>"
                        >Seleccionar</button>

                        <?php echo constant('URL') . 'registrarCliente/verCliente/' . $cliente->DNI_cli; ?>

                        <a href="<?php echo constant('URL') . 'registrarCliente/eliminarCliente/' . $cliente->DNI_cli; ?>">
                        <button class="boton-seleccionar boton">Eliminar</button>
                        </a>
                    <?php } ?>

                </div>

                <div>
                    <button class="boton-atras">Atras</button>
                </div>

            </div>

        </div>


        <?php require_once "views/footer.php"; ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>public/js/registrarCliente.js"></script>

</body>


</html>