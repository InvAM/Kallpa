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
    
    function actualizarEstado()
    {
        if (isset($_POST['confirmar'])) {
            $estado = $_POST['selectedEstado'];
            $IDContrato = $_POST['IDContrato'];
            $mensaje = "";
            if(
                $this->model->updateEvaluar([
                    'selectedEstado' => $estado,
                    'IDContrato' => $IDContrato
                ])
            ){
                $mensaje = 'Actualizado';
                header("Location:" . constant('URL') . 'evaluarContrato');
            }
            $this->render();
        }
    }
}