<?php
class Habilitador extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('empleado');
        $this->view->mensaje="";

    }

    function render()
    {
        $empleado = $this->model->getHabilitador();
        $this->view->empleado=$empleado;
        $this->view->render('asignarHabilitador/formAsignarHabilitador');
    }


}