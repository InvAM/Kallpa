<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.min.css">
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <title>Registrar Contrato</title>
    <link rel="stylesheet" href="public/css/formRegistrarContrato.css">
</head>

<body>
    <div class="registrar-contrato">

        <?php require_once "views/header.php"; ?>

        <div class="cont-1">
            <div class="titulo-principal">
                <h2 class="titulo1">Registro de</h2>
                <h2 class="titulo2">Contratos</h2>
            </div>
        </div>

        <div class="cont-2">
            <h3 class="subtitulo-cli">Datos Generales del Cliente</h3>
            <div class="cont-cliente">
                <div class="icono-cliente">
                    <i class="mdi mdi-account-search"></i>
                </div>
                <div class="grupo1">
                    <label for="">DNI</label>
                    <input type="text" label="" placeholder="DNI" name="dniCliente" id="dniCliente">
                </div>
                <div class="grupo2">
                    <label for="">Nombres y Apellidos del usuario</label>
                    <input type="text" label="" placeholder="Nombre Completo" name="nombrecli" id="nombrecli" readonly>
                    <label for="">Domicilio del usuario</label>
                    <input type="text" label="" placeholder="Dirección Domicilio" name="direcDomicilio" id="direcDomicilio" readonly>
                    <label for="">ID Domicilio</label>
                    <input type="text" label="" placeholder="ID Domicilio" name="iddomicilio" id="iddomicilio" readonly>
                </div>
                <form method="POST" action="<?php echo constant('URL'); ?>registrarContrato/buscarCliente" class="formularioRC" name="formularioRC" id="formularioRC">
                    <div class="boton-cli">
                        <button class="boton-buscar" id="btnBuscar" name="btnBuscar">Buscar Cliente</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="cont-3">
            <h3 class="sub-contrato">Datos del Contrato</h3>
            <div class="cont-contrato">
            <div class=grupo1-cont >
                <label for="">Asesor</label>
                <select name="asesorSelect" id="asesorSelect" onchange="updateContenedor()">
                <option value=""></option>
                <?php
                            include_once 'models/empleado.php';
                            foreach ($this->asesores as $opcion) {
                                $asesor = new Empleado();
                                $asesor = $opcion; ?>
                                <option value="<?php echo $opcion->DNI_Em; ?>">
                                    <?php echo $opcion->Nombre_Em. " ".$opcion->Apellido_Em; ?>
                                </option>
                            <?php } ?>
                </select>
                <label for="">Número de Radicando</label>
                <input type="text" label="" placeholder="Escribir..." name="" id="idnumero">
                <label for="">Tipo de instalación</label>
                <select name="tipoInsSelect" id="tipoInsSelect"  onchange="updateContenedor()">
                <option value=""></option>
                            <?php
                            include_once 'models/tipoinstalacion.php';
                            foreach ($this->tipoinstalaciones as $opcion) {
                                $tipoinstalacion = new TipoInstalacion();
                                $tipoinstalacion = $opcion; ?>
                                <option value="<?php echo $opcion->IDTipoInst; ?>">
                                    <?php echo $opcion->Descripcion_TI; ?>
                                </option>
                            <?php } ?>
                </select>
                <label for="">Estado</label>
                <input type="text" label="" placeholder="Estado" name="estado" id="estado" value="En revisión">
            </div>
            <div class="grupo2-cont">
                <label for="">Punto de instalación</label>
                <input type="number" label="" placeholder="Puntos " name="puntosI" id="puntosI">
                <label for="">Categoría del Gabinete</label>
                <select name="gabineteSelect" id="gabineteSelect" onchange="updateContenedor()">
                <option value=""></option>
                            <?php
                            include_once 'models/categoria_gabinete.php';
                            foreach ($this->gabinetes as $opcion) {
                                $gabinete = new Categoria_Gabinete();
                                $gabinete = $opcion; ?>
                                <option value="<?php echo $opcion->IDGabineteCategoria; ?>">
                                    <?php echo $opcion->Descripcion_Ga; ?>
                                </option>
                            <?php } ?>
                </select>
                <label for="">HUD</label>
                <input type="text" label="" placeholder="HUD" name="HUD" id="HUD">   
                <label for="">Fecha</label>
                        <div class="calendario-wrapper">
                            <input class="calendario" type="date" id="selectedDate" name="selectedDate" min="2000-01-01" max="2023-12-31"
                                onchange="handleDateSelection(event)">
                        </div>
            </div>

            </div>
        </div>

        <div class="cont-4">
            <div class="linea">
                <div>
                    <img src="public/Img/Kallpa.png" class="imagen-kallpainfo">
                </div>
                <div class="espacio">

                    <h3>Datos Generales del Cliente:</h3>
                    <hr>
                    <div>
                        <h4>DNI :                         <span id="mostrarDNI"></span>         </h4>
                        <h4>Nombres y Apellidos :         <span id="mostrarNombres"></span>     </h4>
                        <h4>Domicilio :                   <span id="mostrarDomicilio"></span>   </h4>
                        <h4>ID Domicilio :                <span id="mostrarIDDom"></span>       </h4>
                    </div>
                    <br>
                    <h3>Datos del Contrato:</h3>
                    <hr>
                    <div>
                        <h4>Asesor :                      <span id="mostrarAsesor"></span>      </h4>
                        <h4>Número de Radicando :         <span id="mostrarNumero"></span>      </h4>
                        <h4>Tipo de instalación :         <span id="mostrarTipo"></span>        </h4>
                        <h4>Estado : en revisión          <span id="mostrarEstado"></span>      </h4>
                        <h4>Punto de instalación :        <span id="mostrarPunto"></span>       </h4>
                        <h4>Categoría del Gabinete :      <span id="mostrarCategoria"></span>   </h4>
                        <h4>HUD :                         <span id="mostrarHUD"></span>         </h4>
                        <h4>Fecha :                       <span id="mostrarFecha"></span>       </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="cont-5">
            <div class="grupo1-boton">
                <form method="POST" action="<?php echo constant('URL'); ?>registrarContrato/registrarContrato" class="formularioRC1" name="formularioRC1" id="formularioRC1">
                    <button class="boton1" name="btnRegistrar" id="btnRegistrar">
                    <i class="mdi mdi-book-plus"></i>Registrar</button>
                </form>
                <button class="boton1" name="btnLimpiar" id="btnLimpiar">
                    <i class="mdi mdi-restore"></i>Limpiar</button>
                <button class="boton1" name="btnAtras" id="btnAtras">
                    <i class="mdi mdi-keyboard-backspace"></i>Atras</button>
                <button class="boton1" id="imprimir">
                    
                    <i class="mdi mdi-printer"></i>
                    Imprimir                
                </button>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div>
        
        <?php require_once "views/footer.php" ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>public/js/registrarContrato.js"></script>

    
</body>


</html>

<script>
    //DATOS CLIENTE
    const DNIInput = document.getElementById("dniCliente");
    const mostrarDNI = document.getElementById("mostrarDNI");

    const NombresInput = document.getElementById("nombrecli");
    const mostrarNombres = document.getElementById("mostrarNombres");

    //DATOS DEL CONTRATO
    const NumeroInput = document.getElementById("idnumero");
    const mostrarNumero = document.getElementById("mostrarNumero");

    const puntoInput = document.getElementById("puntosI");
    const mostrarPunto = document.getElementById("mostrarPunto");

    const hudInput = document.getElementById("HUD");
    const mostrarHUD = document.getElementById("mostrarHUD");

    const fechaInput = document.getElementById("selectedDate");
    const mostrarFecha = document.getElementById("mostrarFecha");


        // Datos CLIENTE
        DNIInput.addEventListener("input", () => {
            mostrarDNI.textContent = DNIInput.value;
        });

        NombresInput.addEventListener("input", () => {
            mostrarNombres.textContent = NombresInput.value;
        });

        //Datos CONTRATO
        NumeroInput.addEventListener("input", () => {
            mostrarNumero.textContent = NumeroInput.value;
        });

        puntoInput.addEventListener("input", () => {
            mostrarPunto.textContent = puntoInput.value;
        });

        hudInput.addEventListener("input", () => {
            mostrarHUD.textContent = hudInput.value;
        });

        fechaInput.addEventListener("input", () => {
            mostrarFecha.textContent = fechaInput.value;
        });

    
    //Datos contrato Select
    function updateContenedor(){
        var asesoresSelect = document.getElementById("asesorSelect");
        var mostrarAsesor = document.getElementById("mostrarAsesor");
        mostrarAsesor.textContent = asesoresSelect.options[asesoresSelect.selectedIndex].text;

        var tipoSelect = document.getElementById("tipoInsSelect");
        var mostrarTipo = document.getElementById("mostrarTipo");
        mostrarTipo.textContent = tipoSelect.options[tipoSelect.selectedIndex].text;

        var categoriaSelect = document.getElementById("gabineteSelect");
        var mostrarCategoria = document.getElementById("mostrarCategoria");
        mostrarCategoria.textContent = categoriaSelect.options[categoriaSelect.selectedIndex].text;
    }


</script>