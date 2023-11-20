<?php
include_once "models/etapacontratomodel.php";

class ConsultarContrato extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('contrato');
        $this->etapacontratos= new EtapaContratoModel();
        $this->view->mensaje = "";
    }

    function render()
    {
        $contrato = $this->model->getAprobado();
        $this->view->contrato = $contrato;
        $this->view->render('consultarContrato/formConsultarContrato');
    }

    function generarOrdenI(){
        $datosJson= file_get_contents("php://input");
        $id= json_decode($datosJson, true);
        $contrato= $this->etapacontratos->getComprobarInstalacion($id);
        if(!empty($contrato)){
            $mensaje="El contrato con ID:".$id." ya cuenta con una Orden de Instalacion, ".
                          "por favor seleccione otro contrato";
        }else{
            $mensaje="";
        }
        
        echo json_encode($mensaje);
    }

    function generarOrdenH(){
        $datosJson= file_get_contents("php://input");
        $id= json_decode($datosJson, true);
        $contrato= $this->etapacontratos->getComprobarHabilitacion($id);
        if(!empty($contrato)){
            $mensaje="El contrato con ID:".$id." ya cuenta con una Orden de Habilitacion, ".
                          "por favor seleccione otro contrato";
        }else{
            $mensaje="";
        }
        
        echo json_encode($mensaje);
    }
}