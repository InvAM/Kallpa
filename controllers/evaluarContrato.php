<?php
class EvaluarContrato extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('contrato');
        $this->view->mensaje = "";
        //El usuario debe estar registrado
        session_start();
        if (!isset($_SESSION['dni'])) {
            header("Location:" . constant('URL') . 'Login');
            exit();
        }
    }
    function render()
    {
        $contrato = $this->model->get();
        $this->view->contrato = $contrato;
        $this->view->render('evaluarContrato/formEvaluarContrato');
    }


}