<?php
class ConsultarContrato extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('contrato');
        $this->view->mensaje="";
    }

    function render()
    {
        $contrato= $this->model->getAprobado();
        $this->view->contrato=$contrato;
        $this->view->render('consultarContrato/formConsultarContrato');
    }
}