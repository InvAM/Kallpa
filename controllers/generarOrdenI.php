<?php
include_once "models/detalleetapamaterialmodel.php";
class GenerarOrdenI extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('etapacontrato');
        $this->detalleetapamaterial= new DetalleEtapaMaterialModel();
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
        $etapa_contrato = $this->model->getInstalacion();
        $this->view->etapa_contrato = $etapa_contrato;
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
            if (
                $this->model->insert([
                    'IDContrato_G' => $IDContrato_G,
                    'IDEtapa_G' => $IDEtapa_G,
                    'DNI_Em_T' => $DNI_Em_T,
                    'Fecha' => $Fecha
                ])
            ) {
                $mensaje = "Se genero la orden de Instalación";
            } else {
                $mensaje = "Orden no puede ser generada";
            }
            echo json_encode($mensaje);
        } else {
            // Manejar el caso en el que alguna de las variables es nula
            echo "Error: Datos incompletos";
        }
    }

    function verificarMaterial()
    {
        $datosJson = file_get_contents("php://input");
        $id= json_decode($datosJson, true);
        $detallecontrato= $this->detalleetapamaterial->getComprobarM($id,1);
        if(!empty($detallecontrato)){
             $mensaje="La orden ya cuenta con una asignación de materiales";               
        }else{
            $mensaje="";
        }
        echo json_encode($mensaje);
    }

}
