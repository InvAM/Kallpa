<?php
class GenerarOrdenH extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('etapacontrato');
        $this->view->mensaje="";
    }

    function render()
    {
        $etapa_contrato= $this-> model->getHabilitacion();
        $this->view->etapa_contrato=$etapa_contrato;
        $this->view->render('generarOrdenH/formGenerarOrdenH');
    }

    function registrarOrden(){
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true); // Convierte el JSON a un array asociativo
        
        var_dump($datos);
        // Verificar si el array y las claves existen antes de acceder a ellas
        $IDEtapa_G = isset($datos['IDEtapa_G']) ? $datos['IDEtapa_G'] : null;
        $IDContrato_G = isset($datos['IDContrato_G']) ? $datos['IDContrato_G'] : null;
        $Fecha = isset($datos['Fecha']) ? $datos['Fecha'] : null;
        $DNI_Em_T = isset($datos['DNI_Em_T']) ? $datos['DNI_Em_T'] : null;

               echo "<script>console.log(".$Fecha.")</script>";
               echo "<script>console.log(".$IDContrato_G.")</script>";
               echo "<script>console.log(".$DNI_Em_T.")</script>";
               echo "<script>console.log(".$IDEtapa_G.")</script>";
               
                if($this->model->insert([
                    'IDContrato_G'=>$IDContrato_G,
                    'IDEtapa_G' =>$IDEtapa_G,
                    'DNI_Em_T' =>$DNI_Em_T,
                    'Fecha' =>$Fecha
                ])){
                    echo "<script>console.log('LLEGUE')</script>";
                    $mensaje="Se genero la orden de Habilitación";
                }else{
                    echo "<script>console.log('NO LLEGUE AYUDA')</script>";
                    $mensaje="Orden no puede ser generada";
                }
                $this->view->mensaje=$mensaje;
          
    }

}