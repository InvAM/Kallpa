<?php
class Errores extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "No se encuentra la pagina que esta buscando";
        $this->view->render('errores/errores');
    }


}