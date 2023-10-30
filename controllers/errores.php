<?php
class Errores extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "Este es un mensaje de prueba de error";
        $this->view->render('errores/errores');

    }
}