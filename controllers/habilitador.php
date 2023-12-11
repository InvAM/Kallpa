<?php
class Habilitador extends Controller
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
        $empleado = $this->model->getHabilitador();
        $this->view->empleado = $empleado;
        $this->view->render('asignarHabilitador/formAsignarHabilitador');
    }


}