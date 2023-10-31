<?php
class Errores extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "La pagina que esta intentado acceder no esta disponible";
        $this->view->render('errores/errores');

    }
}