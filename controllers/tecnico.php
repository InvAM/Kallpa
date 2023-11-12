<?php

class Tecnico extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('empleado');
        $this->view->mensaje="";
    }
    
    function render()
    {
        $empleado = $this->model->getTecnico();
        $this->view->empleado=$empleado;
        $this->view->render('asignarTecnico/formAsignarTecnico');
    }

    function volver(){
        header("Location: generarOrdenI");
        exit();
    }
    
    function asignar(){  
    }

    function seleccionar() {

    }
}