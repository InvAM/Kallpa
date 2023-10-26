<?php
class RegistrarEmpleado extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->render('registrarEmpleado/formRegistrarEmpleado');
    }

    function registrarNuevoEmpleado()
    {
        echo "";
    }
}