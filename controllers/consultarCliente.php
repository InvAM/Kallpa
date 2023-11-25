<?php
class ConsultarCliente extends Controller
{
    function __construct()
    {
        parent::__construct();
        //El usuario debe estar registrado
        session_start();
        if (!isset($_SESSION['dni'])) {
            header("Location:" . constant('URL') . 'Login');
            exit();
        }
    }
    function render()
    {
        $this->view->render('consultarCliente/formConsultarCliente');
    }
}