<?php

class Menu extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('credencialesempleado');
        $this->view->mensaje = "";
        session_start();
        if (!isset($_SESSION['dni'])) {
            header("Location:" . constant('URL') . 'login');
            exit();
        }
        $dniSesion = $_SESSION['dni'];
        $credencialesModel = new CredencialesEmpleadoModel();
        $nombreEmpleado = $credencialesModel->getNombreEmpleado($dniSesion);
        $this->view->nombreEmpleado = $nombreEmpleado;
    }
    function render()
    {

        $this->view->render('menu/menu');

    }

}