<?php
class GenerarOrdenI extends Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('etapa_contrato');
        $this->view->mensaje="";
    }

    function render()
    {   
        $etapa_contrato = $this-> model->getInstalacion();
        $this->view->etapa_contrato=$etapa_contrato;
        $this->view->render('generarOrdenI/formGenerarOrdenI');
    }

    function registrarOrden()
    {   
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true); // Convierte el JSON a un array asociativo

        // Acceder a los valores
        $IDEtapa_G = $datos['IDEtapa_G'];
        $IDContrato_G = $datos['IDContrato_G'];
        $Fecha = $datos['Fecha'];
        $DNI_Em_T = $datos['DNI_Em_T'];
        
        echo $IDEtapa_G;
        /*
        $idcontrato= $_POST['IDContrato_G'];
        $idetapa= $_POST['IDEtapa_G'];
        $dniE = $_POST['DNI_Em_T'];
        $fecha =$_POST['selectedDate'];
        $mensaje="";
        
        echo '<script> console.log('.$fecha.')</script>';
        echo '<script> console.log('.$idcontrato.')</script>';
        echo '<script> console.log('.$dniE.')</script>';
        echo '<script> console.log('.$idetapa.')</script>';*/
         
        /*
        if($this->model->insert([
            'IDContrato_G'=>$idcontrato,
            'IDEtapa_G' =>$idetapa,
            'DNI_Em_T' =>$dniE,
            'selectedDate' =>$fecha,
        ])){
            $mensaje="Se genero la orden de Instalación";
        }else{
            $mensaje="Orden no puede ser generada";
        }
        $this->view->mensaje=$mensaje;
        $this->render();*/
    }

}
