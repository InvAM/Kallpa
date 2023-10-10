<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../../Img/KallpaC.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <title>Asignar Materiales</title>
    <link rel="stylesheet" href="formRegistrarMateriales.css">
</head>

<body>
    <div class="registrar-M">
        <div class="cabecera">
            <div>
                <img src="../../Img/Kallpa.png" class="imagen-kallpa">
            </div>
            <div>
                <img src="../../Img/usuario (3).png" class="imagen-usuario">
            </div>
        </div>
        <!--- --------------------------------------------------------------------------------------->
        <div class="contenedorP">
            <div class="tituloP">
                <h2 class="titulo-A">Registrar</h2>
                <h2 class="titulo-B">Materiales</h2>
            </div>
            <div class="contenedorS">
                <div class="cajaContrato">
                    <p class="tituloS2">Especificaciones de contrato</p>
                    <input type="text" label="idContrato" placeholder="ID Contrato">
                    <input type="text" label="fecha" placeholder="Fecha de Orden">
                    <input type="text" label="idEtapa" placeholder="ID Etapa">
                </div>
            </div>
        </div>
        <br>
        <!-------------------------------------------------------------------------------------->
        <div class="ContenedorP1">
            <div class="CajaMaterial">
                <p><Strong>Registrar Materiales</Strong></p>
                <select>
                    <option value="">Seleccione el material</option>
                    <option value="1">Cemento</option>
                    <option value="2">Tubo</option>
                </select>
                <input class="n1" type="number" label="cantidad" placeholder="Cantidad">
                <button class="boton">
                    Añadir
                    <i class="mdi mdi-plus"></i>
                </button>
                <button class="boton">
                    Actualizar
                    <i class="mdi mdi-pencil"></i>
                </button>
                <button class="boton">
                    Eliminar
                    <i class="mdi mdi-delete-empty"></i>
                </button>
            </div>
            <div class="CajaTabla">
                <p><strong>Detalle Materiales</strong></p>
                <div class="tabla">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Material</th>
                                <th>Cantidad</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Cemento</td>
                                <td>50</td>
                                <td>
                                    <button class="btn-small btn-primary" onclick="seleccionarMaterial(item)">
                                        <i class="mdi mdi-eye-settings mx-1"></i>
                                    </button>
                                </td>
                            </tr>
                            <!--Más datos -->
                        </tbody>
                    </table>
                </div>
                <button class="boton-opciones"> Asignar Materiales
                    <i class="mdi mdi-book-plus"></i></button>
                <button class="boton-opciones"> Limpiar
                    <i class="mdi mdi-restore"></i></button>
                <button class="boton-opciones"> Atras
                    <i class="mdi mdi-keyboard-backspace"></i></button>
            </div>
        </div>
        <div class="pie-pagina">
            <p>&copy; 2023 KALLPA. Todos los derechos reservados.</p>
        </div>
    </div>
</body>

</html>