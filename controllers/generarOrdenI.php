<?php
class GenerarOrdenI extends Controller 
{
    public function __construct()
    {
        parent::__construct();
    }

    function render()
    {   
        $this->view->render('generarOrdenI/formGenerarOrdenI');
    }

    function registrarOrden()
    {
      
    }

    function volver()
    {
        header("Location: menu");
        exit;
    }

    function limpiar()
    {
        
    }

    function asignarTecnico(){
     
    }

    function visualizar()
    {

    }
}
