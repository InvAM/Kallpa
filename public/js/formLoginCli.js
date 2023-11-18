function mostrarVentanaEmergente() {
    Swal.fire({
        html: `
            <div id="login.ventana-cliente" style="max-width: 400px; margin: 20px auto; text-align: center; font-family: 'Arial', sans-serif; overflow: hidden;">
                <div class="login.chat-header" style="background-color: #ffffff; color: #203864; padding: 20px; border-radius: 10px;">
                    <div class="login.header-content" style="margin-bottom: 20px;">
                        <img src="public/Img/Kallpa1.png" alt="login.Logo" style="width: 170px; height: 50px; margin-right: 250px;">
                        <div style="height: 4px; background-color: #203864; margin-top: 8px;"></div>
                    </div>
                    <img class="login.Centro1" src="public/Img/usuario (3).png" style="width: 150px; height: 150px; margin-top: 10px;">
                    <div class="login.center-vertically" style="margin: 10px 0;">
                        <div style="display: flex; align-items: center;">
                            <img src="public/Img/correo.png" style="width: 50px; height: 50px; margin-top: 10px; margin-right: 10px;">
                            <input class="login.log" type="text" name="usuario" placeholder="Ingrese Correo..." style="width: 80%; padding: 15px; border: 1px solid #203864; border-radius: 5px; background-color: #ffffff; color: #203864; margin-top: 8px; margin-right: 15px;">
                        </div>
                    </div>
                    <div class="login.center-vertically" style="margin: 10px 0;">
                        <div style="display: flex; align-items: center;">
                            <img src="public/Img/bloquear.png" style="width: 50px; height: 50px; margin-right: 10px;">
                            <input class="login.log" type="password" name="contraseña1" placeholder="Ingrese Contraseña..." required style="width: 80%; padding: 15px; border: 1px solid #203864; border-radius: 5px; background-color: #ffffff; color: #203864; margin-right: 15px;">
                        </div>
                    </div>
                    <div class="login.check" style="margin: 10px 0; display: flex; align-items: center; justify-content: space-between;">
                        <div style="display: flex; align-items: center; margin-top: 10px;">
                            <input type="checkbox" id="check" name="check" value="1" style="margin-right: 5px;margin-top: 10px;">
                            <label for="check" style="margin-right: 10px;margin-top: 10px; color: #203864;">Guardar clave</label>
                        </div>
                        <a href="#" style="text-decoration: none; color: #203864;margin-top: 10px; margin-right: -10px;">¿Olvidaste tu contraseña?</a>
                    </div>
                    <button class="login.popup-nav-btn" onclick="iniciarSesion()" style="background-color: #203864; color: #ffffff; padding: 12px 20px; border: none; border-radius: 5px; cursor: pointer;">Iniciar Sesión</button>
                </div>
            </div>`,
        showConfirmButton: false,
        customClass: {
            popup: 'custom-popup-class',
            title: 'custom-title-class',
        },
    });
}
