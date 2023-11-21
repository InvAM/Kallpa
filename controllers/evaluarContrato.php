<?php
class EvaluarContrato extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('contrato');
        $this->view->mensaje = "";
    }
    function render()
    {
        $contrato = $this->model->get();
        $this->view->contrato = $contrato;
        $this->view->render('evaluarContrato/formEvaluarContrato');
    }


}