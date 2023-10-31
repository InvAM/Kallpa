<?php
class RegistrarCliente extends Controller
{
    function __construct()
    {
        parent::__construct();

    }
    function render()
    {
        $this->view->render('registrarCliente/formRegistrarCliente');
    }
}