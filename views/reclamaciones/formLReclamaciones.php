<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/css/formLReclamaciones.css">
    <link rel="icon" href="public/Img/KallpaC.png" type="image/x-icon">
    <title>Libro de reclamaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
</head>

<body>
    <?php require_once "views/portalHeader.php"; ?>
    <div class="lr">
    <div class="contenedor">
            <fieldset class="cajita1">
                <h1 class="titulo">Libro de reclamaciones</h1>
                <fieldset class="cajas">
                    <legend>Identificacion del consumidor reclamante</legend>
                    <br>
                    <div>
                        <div class="center-vertically" style="margin-top:-26px">
                            <i class="mdi mdi-account icon"></i>
                            <input type="text" name="nombre_r" id="nombre_r" placeholder="Ingrese su nombre" required>
                            <i class="mdi mdi-home  icon"></i>
                            <input type="text" name="domicilio_r" id="domicilio_r" placeholder="Ingrese su domicilio" required><br><br>
                        </div>

                        <div class="center-vertically">
                            <i class="mdi mdi-card-account-details icon"></i>
                            <input type="text" name="dni_r" id="dni_r" placeholder="Ingrese DNI/CE" required>
                            <i class="mdi mdi-cellphone-check icon"></i>
                            <input type="text" name="telefono_r" id="telefono_r" placeholder="Ingrese su telefono ">
                        </div>
                        <div class="center-vertically">
                            <i class="mdi mdi-email-edit icon"></i>
                            <input class="Especial" type="text" name="correo_r" id="correo_r" placeholder="Ingrese su correo electrónico ">
                        </div>
                    </div>
                </fieldset>
                <br>

                <fieldset class="cajas">
                    <legend>Identificación del servicio contratado</legend>
                    <div class="container">
                        <div class="column">
                            <div class="center-vertically">
                                <i class="mdi mdi-account-wrench icon"></i>
                                <label>Tipo de servicio</label>
                            </div>
                            <select required name="tipo_servicio_r" id="tipo_servicio_r">
                                <option value="seleccionar" >Seleccionar tipo de servicio</option>
                                <option value="Instalacion">Instalación</option>
                                <option value="Habilitacion">Habilitación</option>
                                <option value="Ambos Servicio">Ambos servicios</option>
                            </select>
                        </div>
                        <div class="column">
                            <div class="center-vertically">
                                <i class="mdi mdi-cash icon"></i>
                                <label>Monto reclamado</label>
                            </div>
                            <input class="especial2" type="text" name="monto_reclamado_r" id="monto_reclamado_r" placeholder="Ingrese su monto reclamado" required>
                        </div>
                    </div>
                    <div>
                        <div class="textarea-container">
                            <div class="center-vertically">
                                <i class="mdi mdi-text-box icon"></i>
                                <label for="descripcion">Descripción</label>
                            </div>
                            <textarea name="descripcion_r" id="descripcion_r" placeholder="Escribir descripción..." required></textarea>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset class="cajas" style="margin-bottom:-35px">
                    <legend>Detalle de la reclamación y pedido del consumidor</legend>
                    <div>
                        <div class="center-vertically">
                            <i class="mdi mdi-alert-decagram icon"></i>
                            <label>Tipo de reclamación</label>
                        </div>
                        <select required name="tipo_reclamacion_r" id="tipo_reclamacion_r">
                            <option value="seleccionarR">Seleccionar tipo de reclamacion</option>
                            <option value="Reclamo">Reclamo</option>
                            <option value="Queja">Queja</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        <div class="textarea-container">
                            <div class="center-vertically">
                                <i class="mdi mdi-order-alphabetical-ascending icon"></i>
                                <label for="detalle">Detalle</label>
                            </div>
                            <textarea name="detalle_r" id="detalle_r" placeholder="Escribir detalle..."></textarea>
                        </div>
                    </div>
                    <div>
                        <div class="textarea-container">
                            <div class="center-vertically">
                                <i class="mdi mdi-order-bool-descending icon"></i>
                                <label for="pedido">Pedido</label>
                            </div>
                            <textarea name="pedido_r" id="pedido_r" placeholder="Escribir pedido..."></textarea>
                        </div>
                    </div>
                </fieldset>
                <br>
                <br>
                <form method="POST" id="formReclamaciones" name="formReclamaciones">
                    <input class="Botones" type="submit" value="Enviar hoja de reclamación" name="btnReg" id="btnReg">
                </form>
            </fieldset>
    </div>

    <footer>
            <div class="footer-content">
                <p>&copy; 2023 Kallpa. Todos los derechos reservados.</p>
            </div>
    </footer>

    </div>
    <?php require_once "views/chatbot.php"; ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="<?php echo constant('URL'); ?>public/js/reclamaciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>