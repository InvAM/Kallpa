<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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

                <div>

                    <div class="posicion-letra">
                        <p>ID Domicilio</p>
                        <input type="text" label="idDomicilio" placeholder="Escribir...">
                    </div>

                    <img src="public/Img/Casa.jpeg" class="imagen-casa">

                    <div class="posicion-boton">
                        <button class="boton-registrar">Registrar Domicilio</button>
                    </div>

                </div>

            </div>

            <h3 class="subtitulo-cliente">Datos Generales</h3>

            <div class="contenedor-datos">

                <div class="input-todo">
                    <p>Nombre del Cliente</p>
                    <input type="text" label="Nombre_Cliente" placeholder="Escribir...">
                    <p>Apellido del Cliente</p>
                    <input type="text" label="Apellido_Cliente" placeholder="Escribir...">
                </div>

                <div class="datos_izquierda">
                    <p>Dni del Cliente</p>
                    <input type="text" label="Dni" placeholder="Escribir...">
                    <p>Fecha de Nacimiento</p>
                    <input type="text" label="FechaNacimiento" placeholder="Ejemplo: 2023-07-08">
                    <p>Género</p>
                    <select>
                        <option value="">Escoger...</option>
                        <option value="femenino">Femenino</option>
                        <option value="masculino">Masculino</option>
                        <!-- Seguir con opciones -->
                    </select>
                </div>

                <div class="datos_derecha">
                    <p>Celular</p>
                    <input type="text" label="celular" placeholder="Escribir...">
                    <p>Nacionalidad</p>
                    <select>
                        <option value="">Escoger...</option>
                        <option value="per">Peruano</option>
                        <option value="ven">Venezolano</option>
                        <!-- Seguir con opciones -->
                    </select>
                    <p>Estado Civil</p>
                    <select>
                        <option value="">Escoger...</option>
                        <option value="sol">Soltero</option>
                        <option value="cas">Casado</option>
                        <!-- Seguir con opciones -->
                    </select>
                </div>

            </div>

            <div class="contenedor-botones">
                <button type="submit" class="boton-datos">Registrar Cliente</button>
                <button class="boton-datos">Limpiar</button>
            </div>

            <div class="contenedor-info">

                <div class="linea">
                    <div>
                        <img src="public/Img/Kallpa.png" class="imagen-kallpainfo">
                    </div>
                    <h3>Fecha: 07/10/2023</h3>
                </div>

                <div class="espacio">

                    <h3>Datos del usuario:</h3>
                    <hr>
                    <div>
                        <h4>Nombres : <!-- Dato --></h4>
                        <h4>Apellidos : <!-- Dato --></h4>
                        <h4>DNI : <!-- Dato --></h4>
                        <h4>Fecha Nacimiento : <!-- Dato --></h4>
                        <h4>Género : <!-- Dato --></h4>
                        <h4>Nacionalidad : <!-- Dato --></h4>
                        <h4>Estado Civil : <!-- Dato --></h4>
                        <h4>Celular : <!-- Dato --></h4>
                    </div>

                </div>

                <div>
                    <button class="boton-atras">Atras</button>
                </div>

            </div>

        </div>


        <?php require_once "views/footer.php"; ?>

    </div>
</body>

</html>