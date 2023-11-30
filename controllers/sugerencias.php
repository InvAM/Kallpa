<?php

include_once "models/clientemodel.php";

class sugerencias extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel("sugerencia");
        $this->clientes = new ClienteModel();
        session_start();
        if (isset($_SESSION['nombrecliente'])) {
            $nombrecliente = $_SESSION['nombrecliente'];
            $this->view->nombrecliente = $nombrecliente;
        } else {
            $this->view->nombrecliente = null;
        }
    }
    function render()
    {
        $this->view->render('sugerencia/formBSugerencias');
    }

    function registrarSugerencia()
    {
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true);

        $nombres = isset($datos['nombres']) ? $datos['nombres'] : null;
        $dni = isset($datos['DNI_cli']) ? $datos['DNI_cli'] : null;
        $apellidos = isset($datos['apellidos']) ? $datos['apellidos'] : null;
        $email = isset($datos['email']) ? $datos['email'] : null;
        $comentario = isset($datos['comentario']) ? $datos['comentario'] : null;

        if ($dni !== null) {
            $cliente = $this->clientes->getEspecial($dni);
            if (empty($cliente)) {
                $mensaje = "";
            } else {
                if (
                    $this->model->insert([
                        'dni' => $dni,
                        'email' => $email,
                        'comentario' => $comentario
                    ])
                ) {
                    $mensaje = "La sugerencia de " . $nombres . " " . $apellidos . " ha sido registrada con éxito";
                } else {
                    $mensaje = "Error al registrar la sugerencia";
                }
            }
            echo json_encode(['mensaje' => $mensaje]);
        } else {
            echo "Error: Datos incompletos";
        }
    }
}