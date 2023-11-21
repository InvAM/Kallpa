<?php

class loginClientes extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('credencialescliente');
        $this->view->mensaje = "";
    }

    function loguearse()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $datos = array('username' => $username, 'password' => $password);

            $credenciales = $this->model->getCredencialesCliente($datos);


            if ($credenciales !== null) {
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                $_SESSION["credencialescliente"] = array();
                echo "OK";
                exit();

            } else {
                echo "Credenciales incorrectas";
            }
        }
    }
}