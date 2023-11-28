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
        // Verificar que la solicitud sea de tipo POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Obtener los datos JSON del cuerpo de la solicitud
            $json_data = file_get_contents("php://input");
            $data = json_decode($json_data, true);

            // Acceder a los datos
            $dni = $data['dni'];
            $nombreusuario = $data['nombreusuario'];
            $password = $data['password'];

            // Crear una instancia del modelo
            $credencialesModel = new CredencialesEmpleadoModel();

            // Obtener las credenciales del empleado
            $credenciales = $credencialesModel->getCredencialesEmpleado($data);

            // Crear un array para la respuesta
            $response = array();

            // Verificar si se encontraron credenciales
            if ($credenciales !== null) {

                session_start(); // Iniciar la sesión

                // Almacena datos en la sesión (puedes agregar más datos si es necesario)
                $_SESSION['dni'] = $credenciales->DNI_Em;
                $_SESSION['nombreusuario'] = $credenciales->nombreusuario;
                // Autenticación exitosa
                $response['success'] = true;
                $response['message'] = "Inicio de sesión exitoso";
                $response['dni'] = $credenciales->DNI_Em;
                $response['nombreusuario'] = $credenciales->nombreusuario;
                // Puedes añadir más datos al array de respuesta si es necesario
            } else {
                // Autenticación fallida
                $response['success'] = false;
                $response['message'] = "Credenciales incorrectas";
            }

            // Devolver la respuesta como JSON
            header('Content-Type: application/json');
            echo json_encode($response);
        } else {
            // Manejar el caso en el que se accede a esta función de manera incorrecta
            // Redireccionar u mostrar un mensaje de error, según sea necesario
        }
    }


}
?>