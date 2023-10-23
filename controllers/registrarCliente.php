<?php
class RegistrarCliente extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->render('registrarCliente/formRegistrarCliente');
    }
}