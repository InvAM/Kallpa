<?php

class Tecnico extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('empleado');
        $this->view->mensaje = "";
        //El usuario debe estar registrado
        session_start();
        if (!isset($_SESSION['dni'])) {
            header("Location:" . constant('URL') . 'Login');
            exit();
        }
    }

    function render()
    {
        $empleado = $this->model->getTecnico();
        $this->view->empleado = $empleado;
        $this->view->render('asignarTecnico/formAsignarTecnico');
    }
}