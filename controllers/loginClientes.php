<?php

class loginClientes extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('cliente');
        $this->view->mensaje = "";
    }

    function loguearse()
    {

        $json_data = file_get_contents("php://input");
        $data = json_decode($json_data, true);


        //acceder a los datos

        $nombre = $data['nombrecliente'];
        $dni = $data['dnicliente'];

        $credencialesModel = new ClienteModel();

        $credenciales = $credencialesModel->getCredencialesCliente($data);

        $response = array();

        if ($credenciales !== null) {
            session_start();
            $_SESSION['nombrecliente'] = $credenciales->Nombre_cli;
            $_SESSION['carrito'] = array();
            $response['success'] = true;
            $response['message'] = 'Inicio de sesion exitoso';
            $response['nombrecliente'] = $credenciales->Nombre_cli;
        } else {
            $response['success'] = false;
            $response['message'] = 'Credenciales incorrectas';
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}