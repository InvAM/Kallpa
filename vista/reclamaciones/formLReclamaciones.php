<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="formLReclamaciones.css">
    <title>Libro de reclamaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.1/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">

</head>

<body>
    <div id="contenedor">
        <form method="POST" action="procesaLogin.php">
            <fieldset class="cajita1">
                <h1 class="titulo">Libro de reclamaciones</h1>
                <fieldset class="cajas">
                    <legend>Identificacion del consumidor reclamante</legend>
                    <br>
                    <div>
                        <div class="center-vertically">
                            <i class="mdi mdi-account"
                                style="width:30px; height:30px;font-size: 30px;color: #1a237e; margin-right: 5px; margin-left: 5px"></i>
                            <input type="text" name="nombre" placeholder="Ingrese su nombre" required>
                            <i class="mdi mdi-home"
                                style="width:30px; height:30px;font-size: 30px;color: #1a237e; margin-right: 5px; margin-left: 5px"></i>
                            <input type="text" name="Domicilio" placeholder="Ingrese su domicilio" required><br><br>
                        </div>

                        <div class="center-vertically">
                            <i class="mdi mdi-card-account-details"
                                style="width:30px; height:30px;font-size: 30px;color: #1a237e; margin-right: 5px; margin-left: 5px"></i>
                            <input type="password" name="contraseña2" placeholder="Ingrese DNI/CE" required>
                            <i class="mdi mdi-cellphone-check"
                                style="width:30px; height:30px;font-size: 30px;color: #1a237e; margin-right: 5px; margin-left: 5px"></i>
                            <input type="text" name="telefono" placeholder="Ingrese su telefono ">
                        </div>
                        <div class="center-vertically">
                            <i class="mdi mdi-email-edit"
                                style="width:30px; height:30px;font-size: 30px; color: #1a237e;margin-right: 5px; margin-left: 5px"></i>
                            <input class="Especial" type="text" name="email"
                                placeholder="Ingrese su correo electrónico ">
                        </div>
                    </div>
                </fieldset>
                <br>

                <fieldset class="cajas">
                    <legend>Identificación del servicio contratado</legend>
                    <div class="container">
                        <div class="column">
                            <div class="center-vertically">
                                <i class="mdi mdi-account-wrench" style="width:30px; height:30px;font-size: 30px;"></i>
                                <label>Tipo de servicio</label>
                            </div>
                            <select required>
                                <option value="seleccionar">Seleccionar tipo de servicio</option>
                                <option value="producto">Instalación</option>
                                <option value="servicio">Habilitación</option>
                                <option value="servicio">Ambos servicios</option>
                            </select>
                        </div>
                        <div class="column">
                            <div class="center-vertically">
                                <i class="mdi mdi-cash" style="width:30px; height:30px;font-size: 30px;"></i>
                                <label>Monto reclamado</label>
                            </div>
                            <input class="especial2" type="text" placeholder="Ingrese su tipo de bien" required>
                        </div>
                    </div>
                    <div>
                        <div class="textarea-container">
                            <div class="center-vertically">
                                <i class="mdi mdi-text-box"
                                    style="width:30px; height:30px;font-size: 30px;color: #1a237e"></i>
                                <label for="descripcion">Descripción</label>
                            </div>
                            <textarea id="descripcion" name="descripcion" rows="4" cols="50"
                                placeholder="Escribe aquí la descripción" resize="none">
                                </textarea>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset class="cajas">
                    <legend>Detalle de la reclamación y pedido del consumidor</legend>
                    <div>
                        <div class="center-vertically">
                            <i class="mdi mdi-alert-decagram"
                                style="width:30px; height:30px;font-size: 30px;color:#1a237e"></i>
                            <label>Tipo de reclamación</label>
                        </div>
                        <select required>
                            <option value="seleccionarR">Seleccionar tipo de reclamacion</option>
                            <option value="reclamo">Reclamo</option>
                            <option value="queja">Queja</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        <div class="textarea-container">
                            <div class="center-vertically">
                                <i class="mdi mdi-order-alphabetical-ascending"
                                    style="width:30px; height:30px;font-size: 30px;color: #1a237e"></i>
                                <label for="detalle">Detalle</label>
                            </div>
                            <textarea id="detalle" name="detalle" rows="4" cols="50"
                                placeholder="Escribe aquí el detalle del reclamo" resize="none">
                                </textarea>
                        </div>
                    </div>
                    <div>
                        <div class="textarea-container">
                            <div class="center-vertically">
                                <i class="mdi mdi-order-bool-descending"
                                    style="width:30px; height:30px;font-size: 30px;color: #1a237e"></i>
                                <label for="pedido">Pedido</label>
                            </div>
                            <textarea id="pedido" name="pedido" rows="4" cols="50"
                                placeholder="Escribe aquí el detalle del pedido" resize="none">
                                </textarea>
                        </div>
                    </div>
                </fieldset>
                <br>
                <br>
                <input type="hidden" name="accion" value="add" />
                <input class="Botones" type="submit" value="Enviar hoja de reclamación">
                <input class="Botones" type="reset" value="Limpiar hoja de reclamación">
                <input class="Botones" type="submit" value="Volver a Paginas Principal">
            </fieldset>
        </form>
    </div>
</body>

</html>