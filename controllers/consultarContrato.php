<?php
class ConsultarContrato extends Controller
{
    function __construct()
    {
        parent::__construct();

    }

    function render()
    {
        $this->view->render('consultarContrato/formConsultarContrato');
    }
}