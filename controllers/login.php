<?php

class login extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('credencialesempleado');
        $this->view->mensaje = "";

    }

    function render()
    {
        $this->view->render('login/formLoginP');
    }

    function loguearse()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dni = $_POST['dni'];
            $nombreUsuario = $_POST['nombreusuario'];
            $password = $_POST['password'];

            // Validación adicional, asegúrate de realizar la validación necesaria

            // Llamar al método de inicio de sesión en el modelo
            $credenciales = $this->model->getCredencialesEmpleado($dni, $nombreUsuario, $password);

            if ($credenciales !== null) {

                // Inicio de sesión exitoso
                // Puedes almacenar información del usuario en la sesión
                $_SESSION['dni'] = $credenciales->DNI_Em;
                $_SESSION['nombreUsuario'] = $credenciales->nombreusuario;
                echo "OK";
                exit();

            } else {
                echo "Credenciales incorrectas";
            }
        } else {
            // Manejar el caso en el que se accede a esta función de manera incorrecta
            // Redireccionar u mostrar un mensaje de error, según sea necesario
        }
    }
}
?>