<?php
include_once "models/etapacontratomodel.php";

class ConsultarContrato extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('contrato');
        $this->etapacontratos = new EtapaContratoModel();
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
        $contrato = $this->model->getAprobado();
        $this->view->contrato = $contrato;
        $this->view->render('consultarContrato/formConsultarContrato');
    }

    function generarOrdenI()
    {
        $datosJson = file_get_contents("php://input");
        $id = json_decode($datosJson, true);
        $contrato = $this->etapacontratos->getComprobarInstalacion($id);
        if (!empty($contrato)) {
            $mensaje = "El contrato seleccionado ya cuenta con una Orden de Instalacion, por favor seleccione otro contrato";
        } else {
            $mensaje = "";
        }

        echo json_encode($mensaje);
    }

    function generarOrdenH()
    {
        $datosJson = file_get_contents("php://input");
        $id = json_decode($datosJson, true);
        $contrato = $this->etapacontratos->getComprobarHabilitacion($id);
        if (!empty($contrato)) {
            $mensaje = "El contrato seleccionado ya cuenta con una Orden de Habilitacion, " .
                "por favor seleccione otro contrato";
        } else {
            $mensaje = "";
        }

        echo json_encode($mensaje);
    }

    function exportarxls() {
        $contratos = $this->model->getExcel();
    
        if (!empty($contratos)) {
            $filename = "ReporteContrato.xls";
    
            // Configurar las cabeceras para la descarga del archivo
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=" . $filename);
            header("Pragma: no-cache");
            header("Expires: 0");
    
            $mostrar_columnas = false;
    
            echo '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
            echo '<head><meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"></head>';
            echo '<body>';
    
            echo '<table>';
    
            foreach ($contratos as $contrato) {
                if (!$mostrar_columnas) {
                    $columnas = array_keys(get_object_vars($contrato));
                    echo '<tr>';
                    foreach ($columnas as $columna) {
                        echo '<th style="background-color: #203864; color: #ffffff;">' . $columna . '</th>';
                    }
                    echo '</tr>';
                    $mostrar_columnas = true;
                }
    
                echo '<tr>';
                foreach ($columnas as $columna) {
                    echo '<td>' . $contrato->$columna . '</td>';
                }
                echo '</tr>';
            }
    
            echo '</table>';
            echo '</body>';
            echo '</html>';
    
            exit;
        } else {
            echo "No hay datos a exportar";
        }
    }
    

}