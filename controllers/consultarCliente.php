<?php
class ConsultarCliente extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->render('consultarCliente/formConsultarCliente');
    }
}