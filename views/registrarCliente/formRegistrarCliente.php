<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    
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
                            <input type="text" label="id" placeholder="Escribir..." name="IDDomicilio_reg"
                                id="IDDomicilio_reg">
                            <label for="Direccion_Dom_reg">Dirección</label>
                            <input type="text" label="direc" placeholder="Escribir..." name="Direccion_Dom_reg"
                                id="Direccion_Dom_reg">
                            <label for="Interior_Dom_reg">Interior</label>
                            <input type="text" label="inte" placeholder="Escribir..." name="Interior_Dom_reg"
                                id="Interior_Dom_reg">
                        </div>
                        <div class="grupo2">
                            <label for="Piso_Dom_reg">Piso</label>
                            <input type="text" label="piso" placeholder="Escribir..." name="Piso_Dom_reg"
                                id="Piso_Dom_reg">
                            <label for="Nomb_Malla_Dom_reg">Nombre de Malla</label>
                            <input type="text" label="malla" placeholder="Escribir..." name="Nomb_Malla_Dom_reg"
                                id="Nomb_Malla_Dom_reg">
                            <label for="IDCondicion">Condición</label>
                            <select name="IDCondicion" id="IDCondicion" onchange="updateContenedor()">
                            <option value=""></option>
                                <?php
                                include_once 'models/condicion.php';
                                foreach ($this->condiciones as $opcion) {
                                    $condicion = new Condicion();
                                    $condicion = $opcion; ?>
                                    <option value="<?php echo $opcion->IDCondicion; ?>">
                                        <?php echo $opcion->Descripcion_Co; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="grupo3">
                            <label for="IDEstrato_reg">Estrato</label>
                            <select name="IDEstrato_reg" id="IDEstrato_reg" onchange="updateContenedor()">
                            <option value=""></option>
                                <?php
                                include_once 'models/estrato.php';
                                foreach ($this->estratos as $opcion) {
                                    $estratos = new Estrato();
                                    $estratos = $opcion; ?>
                                    <option value="<?php echo $opcion->IDEstrato; ?>">
                                        <?php echo $opcion->Descripcion_Estrato; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <label for="IDPredio_reg">Predio</label>
                            <select name="IDPredio_reg" id="IDPredio_reg"  onchange="updateContenedor()">
                            <option value=""></option>
                            <?php
                                include_once 'models/predio.php';
                                foreach ($this->predios as $opcion) {
                                    $predios = new Tipopredio();
                                    $predios = $opcion; ?>
                                    <option value="<?php echo $opcion->IDPredio; ?>">
                                        <?php echo $opcion->Descripcion_Pre; ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <label for="IDDistrito_reg">Distrito</label>
                            <select name="IDDistrito_reg" id="IDDistrito_reg" onchange="updateContenedor()">
                            <option value=""></option>
                                <?php
                                include_once 'models/distrito.php';
                                foreach ($this->distritos as $opcion) {
                                    $distritos = new Tipopredio();
                                    $distritos = $opcion; ?>
                                    <option value="<?php echo $opcion->IDDistrito; ?>">
                                        <?php echo $opcion->Nombre_Di; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="icono-dom">
                            <i class="mdi mdi-home-assistant"></i>
                        </div>
                    </div>

            

                </div>

            </div>

            <h3 class="subtitulo-cliente">Datos del Cliente</h3>

            <div class="contenedor-datos">
                <form action="<?php echo constant('URL'); ?>registrarCliente/registrarNuevoCliente" method="POST"
                    autocomplete="off" class="" id="formularioC">
                    <div class="input-todo">
                        <label for="Nombre_cli_reg">Nombre del cliente</label>
                        <input type="text" label="Nombre" placeholder="Escribir..." name="Nombre_cli_reg"
                            id="Nombre_cli_reg">
                        <label for="Apellido_cli_reg">Apellido del Cliente</label>
                        <input type="text" label="Apellido" placeholder="Escribir..." name="Apellido_cli_reg"
                            id="Apellido_cli_reg">
                        <label for="DNI_cli_reg">Dni del Cliente</label>
                        <input type="text" label="DNI" placeholder="Escribir... " name="DNI_cli_reg" id="DNI_cli_reg">
                        <label for="FechaNacimiento">Fecha de Nacimiento</label>
                            <div class="calendario-wr">
                                <input class="calendario" type="date" id="FechaNacimiento" name="FechaNacimiento"
                                onchange="handleDateSelection(event)">
                            </div>
                    </div>


                    <div class="datos_derecha">
                        <label for="IDGenero_reg">Género</label>
                        <select name="IDGenero_reg" id="IDGenero_reg" onchange="updateContenedor()">
                        <option value=""></option>
                            <?php
                            include_once 'models/genero.php';
                            foreach ($this->generos as $opcion) {
                                $generos = new Genero();
                                $generos = $opcion; ?>
                                <option value="<?php echo $opcion->IDGenero; ?>">
                                    <?php echo $opcion->Descripcion_G; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label for="Celular_cli_reg">Célular</label>
                        <input type="text" label="celular" placeholder="Escribir..." name="Celular_cli_reg"
                            id="Celular_cli_reg">
                        <label for="IDNacionalidad_reg">Nacionalidad</label>
                        <select name="IDNacionalidad_reg" id="IDNacionalidad_reg" onchange="updateContenedor()">
                        <option value=""></option>
                            <?php
                            include_once 'models/nacionalidad.php';
                            foreach ($this->nacionalidades as $opcion) {
                                $nacionalidades = new Genero();
                                $nacionalidades = $opcion; ?>
                                <option value="<?php echo $opcion->IDNacionalidad; ?>">
                                    <?php echo $opcion->Descripcion_NA; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label for="IDEstadoCivil_reg">Estado Civil</label>
                        <select name="IDEstadoCivil_reg" id="IDEstadoCivil_reg" onchange="updateContenedor()">
                        <option value=""></option>
                            <?php
                            include_once 'models/estadocivil.php';
                            foreach ($this->estados as $opcion) {
                                $estados = new Estadocivil();
                                $estados = $opcion; ?>
                                <option value="<?php echo $opcion->IDEstadoCivil; ?>">
                                    <?php echo $opcion->Descripcion_Es; ?>
                                </option>
                            <?php } ?>
                        </select>
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

                    <h3>Datos del domicilio:</h3>
                    <hr>
                    <div>
                        <h4>IDDomicilio :       <span id="mostrarIDDomicilio"></span> </h4>
                        <h4>Dirección :         <span id="mostrarDirec"></span>       </h4>
                        <h4>Interior :          <span id="mostrarInterior"></span>    </h4>
                        <h4>Piso :              <span id="mostrarPiso"></span>        </h4>
                        <h4>Nombre de Malla :   <span id="mostrarMalla"></span>       </h4>
                        <h4>Condición :         <span id="mostrarCondicion"></span>   </h4>
                        <h4>Estrato :           <span id="mostrarEstrato"></span>     </h4>
                        <h4>Predio :            <span id="mostrarPredio"></span>      </h4>
                        <h4>Distrito :          <span id="mostrarDistrito"></span></h4>
                    </div>
                    <br>
                    <h3>Datos del Cliente:</h3>
                    <hr>
                    <div>
                        <h4>Nombre :              <span id="mostrarNombre"></span>      </h4>
                        <h4>Apellido :            <span id="mostrarApellido"></span>    </h4>
                        <h4>DNI :                 <span id="mostrarDNI"></span>         </h4>
                        <h4>Fecha de Nacimiento : <span id="mostrarFecha"></span>       </h4>
                        <h4>Género :              <span id="mostrarGenero"></span>      </h4>
                        <h4>Célular :             <span id="mostrarCelular"></span>     </h4>
                        <h4>Nacionalidad :        <span id="mostrarNacionalidad"></span></h4>
                        <h4>Estado Civil :        <span id="mostrarEstado"></span>      </h4>
                    </div>
                </div>
                

            </div>

            <div class="cont-button">
                <div class="button1">
                    <form method="POST" action="<?php echo constant('URL'); ?>registrarCliente/registrarCliente" class="formularioRCL1" name="formularioRCL1" id="formularioRCL1">
                        <button class="boton1" name="btnRegistrar" id="btnRegistrar">
                        <i class="mdi mdi-book-plus"></i>Registrar</button>
                        </button>
                    </form>
                </div>
                <button class="boton1" name="btnLimpiar" id="btnLimpiar">
                    <i class="mdi mdi-restore"></i>Limpiar</button>
                <button class="boton1" name="btnAtras" id="btnAtras">
                    <i class="mdi mdi-keyboard-backspace"></i>Atras</button>
            </div>

        </div>


        <?php require_once "views/footer.php"; ?>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>public/js/registrarCliente.js"></script>
    <script src="<?php echo constant('URL'); ?>public/js/cliente.js"></script>

    
</body>


</html>
