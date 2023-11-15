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

// Verificar si el array y las claves existen antes de acceder a ellas
$IDEtapa_G = isset($datos['IDEtapa_G']) ? $datos['IDEtapa_G'] : null;
$IDContrato_G = isset($datos['IDContrato_G']) ? $datos['IDContrato_G'] : null;
$Fecha = isset($datos['Fecha']) ? $datos['Fecha'] : null;
$DNI_Em_T = isset($datos['DNI_Em_T']) ? $datos['DNI_Em_T'] : null;

// Verificar si alguna de las variables es nula antes de utilizarla
if ($IDEtapa_G !== null && $IDContrato_G !== null && $Fecha !== null && $DNI_Em_T !== null) {
    // Ahora puedes utilizar estos valores como desees en tu controlador
        if($this->model->insert([
            'IDContrato_G'=>$IDContrato_G,
            'IDEtapa_G' =>$IDEtapa_G,
            'DNI_Em_T' =>$DNI_Em_T,
            'Fecha' =>$Fecha
        ])){
            $mensaje="Se genero la orden de Instalación";

            echo '<script> console.log('.$mensaje.')</script>';
        }else{
            $mensaje="Orden no puede ser generada";
            
            echo '<script> console.log('.$mensaje.')</script>';
        }
        $this->view->mensaje=$mensaje;
        $this->render();
} else {
    // Manejar el caso en el que alguna de las variables es nula
    echo "Error: Datos incompletos";
}
    }

}
