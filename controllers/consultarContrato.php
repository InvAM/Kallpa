<?php
class ConsultarContrato extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->render('consultarContrato/formConsultarContrato');
    }
}