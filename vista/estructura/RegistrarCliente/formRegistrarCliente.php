<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="stylesheet" href="../RegistrarClienteEstyle/formRegistrarCliente.css">
</head>

<body>
    <div class="registrar-cli">
        <div class="app-bar" color="white" dense dark height="110">
            <div class="toolbar-title">
                <img src="../../views/Img/Kallpa.png" alt="Kallpa" style="max-height: 300px; max-width: 200px;"
                    class="kallpa-image">
            </div>
            <div class="spacer"></div>
            <img src="../../views/Img/usuario (3).png" alt="Usuario" style="max-height: 100px; max-width: 50px;">
        </div>
        <div class="footer" color="#33cc33" app height="60">
            <div class="row" align="center" justify="center">
                <div class="col" style="text-align: center; color: white;">
                    &copy; 2023 KALLPA. Todos los derechos reservados.
                </div>
            </div>
        </div>
        <div class="d-flex" style="justify-content: center">
            <h2 style="color: rgba(0, 0, 129, 0.829); margin-right: 10px; font-size: 30px; font-weight: bold">
                Registrar
            </h2>
            <h2 style="color: rgb(62, 207, 62); font-size: 30px; font-weight: bold">
                Cliente
            </h2>
        </div>
        <form name="registrarCliente">
            <div class="cliente">
                <div class="d-flex" style="align-items: center">
                    <div class="mr-4">
                        <input type="text" label="ID Domicilio" placeholder="Ingrese el código de domicilio"
                            style="width: 180px;">
                    </div>
                    <div
                        style="display: flex; flex-direction: row-reverse; align-items: center;">
                        <button class="button-1 mt-0" style="background-color: primary;">Registrar Domicilios</button>
                        <i style="align-items: center; display: flex; margin-bottom: 30px; font-size: 70px; color: green;">mdi-home-analytics</i>
                    </div>
                </div>
                <div class="my-container">
                    <div class="custom-text-field">
                        <input type="text" label="Nombre Cliente" placeholder="Ingresa el nombre del Cliente">
                        <input type="text" label="Apellido Cliente" placeholder="Ingrese los apellidos del Cliente">
                        <div>
                            <input type="text" label="DNI Cliente" placeholder="Ingresa el DNI del Cliente">
                            <input type="text" label="Fecha de Nacimiento" placeholder="Ejemplo: 2023-07-08">
                            <select>
                                <option>Selecciona el Género</option>
                                <!-- Agrega aquí las opciones de género -->
                            </select>
                        </div>
                        <div>
                            <input type="text" label="N° Celular" placeholder="Ingrese el número de celular del Cliente">
                            <select>
                                <option>Selecciona la Nacionalidad</option>
                                <!-- Agrega aquí las opciones de nacionalidad -->
                            </select>
                            <select>
                                <option>Selecciona el Estado Civil</option>
                                <!-- Agrega aquí las opciones de estado civil -->
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="resumen">
                <div class="my-container-2">
                    <div class="info">
                        <div class="image-container">
                            <img src="../../views/Img/Kallpa.png" alt="Kallpa" style="max-height: 300px; max-width: 200px;">
                        </div>
                        <h3>Fecha: <!-- Agrega aquí la fecha --></h3>
                    </div>

                    <h3>Datos del usuario:</h3>
                    <hr>
                    <div class="text">
                        <h4>Nombres : <!-- Agrega aquí los nombres del cliente --></h4>
                        <h4>Apellidos : <!-- Agrega aquí los apellidos del cliente --></h4>
                        <h4>DNI : <!-- Agrega aquí el DNI del cliente --></h4>
                        <h4>Fecha Nacimiento : <!-- Agrega aquí la fecha de nacimiento del cliente --></h4>
                        <h4>Género : <!-- Agrega aquí el género del cliente --></h4>
                        <h4>Nacionalidad : <!-- Agrega aquí la nacionalidad del cliente --></h4>
                        <h4>Estado Civil : <!-- Agrega aquí el estado civil del cliente --></h4>
                        <h4>Celular : <!-- Agrega aquí el número de celular del cliente --></h4>
                    </div>
                </div>
            </div>
            <div class="btn-container">
                <div class="btn1">
                    <button type="submit" class="button-1 mt-2" style="background-color: primary;">Registrar Cliente</button>
                    <button class="button-1 mt-2" style="background-color: #47d847;" onclick="resetForm();" dark>Limpiar</button>
                </div>
            </div>

            <div class="btn3">
                <button class="button-1 mt-2 btn-atras" style="background-color: primary;" onclick="volverMenu();">Atras</button>
            </div>
        </form>
    </div>
</body>

</html>