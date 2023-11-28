<?php
class EvaluarContrato extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('contrato');
        $this->view->mensaje = "";
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
    
    function actualizarEstado()
    {
        $datosJson= file_get_contents("php://input");
        $datos= json_decode($datosJson, true);
        //Obteniendo datos
        $estado =isset($datos['Estado'])?$datos['Estado']: null;
        $IDContrato =isset($datos['IDContrato'])?$datos['IDContrato']: null;
        if($IDContrato !==null){
            if(
                $this->model->updateEvaluar([
                    'Estado' => $estado,
                    'IDContrato' => $IDContrato
                ])
            ){
                $mensaje = 'El contrato con ID:'.$IDContrato.' ha sido actualizado con éxito';
            }else{
                $mensaje= 'No se pudo realizar la actualización';
            }
            echo json_encode($mensaje);
        }

    }
}