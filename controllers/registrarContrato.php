<?php
include_once "models/empleadomodel.php";
include_once "models/clientemodel.php";
include_once "models/categoria_gabinetemodel.php";
include_once "models/tipoinstalacionmodel.php";

class RegistrarContrato extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->loadModel('contrato');
        $this->asesores = new EmpleadoModel();  // Inicializar la propiedad
        $this->clientes = new ClienteModel();
        $this->gabinetes = new Categoria_GabineteModel();
        $this->tipoinstalaciones = new TipoInstalacionModel();
        $this->view->mensaje = "";

       // El usuario debe estar registrado
        session_start();
        if (!isset($_SESSION['dni'])) {
            header("Location:" . constant('URL') . 'Login');
        exit();
        }
    }

    function render()
    {
        $asesores = $this->asesores->getAsesores();  // Usar la propiedad
        $gabinetes = $this->gabinetes->get();
        $tipoinstalaciones = $this->tipoinstalaciones->get();
        $this->view->asesores = $asesores;
        $this->view->gabinetes = $gabinetes;
        $this->view->tipoinstalaciones = $tipoinstalaciones;
        $this->view->render('registrarContrato/formRegistrarContrato');
    }

    function buscarCliente()
    {
        $datosJson = file_get_contents("php://input");
        $dni = json_decode($datosJson, true);

        $cliente = $this->clientes->getEspecial($dni);
        echo json_encode($cliente);
    }

    function registrarContrato()
    {
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true); // Convierte el JSON a un array asociativo

        //verificar 
        $IDContrato = isset($datos['IDContrato']) ? $datos['IDContrato'] : null;
        $Fecha_Con = isset($datos['Fecha_Con']) ? $datos['Fecha_Con'] : null;
        $NumeroRadicado_Con = isset($datos['NumeroRadicado_Con']) ? $datos['NumeroRadicado_Con'] : null;
        $PuntoInstalacion_Con = isset($datos['PuntoInstalacion_Con']) ? $datos['PuntoInstalacion_Con'] : null;
        $numSum = isset($datos['numSum']) ? $datos['numSum'] : null;
        $estado = isset($datos['estado']) ? $datos['estado'] : null;
        $IDDomicilio = isset($datos['IDDomicilio']) ? $datos['IDDomicilio'] : null;
        $DNI_cli = isset($datos['DNI_cli']) ? $datos['DNI_cli'] : null;
        $DNI_Em = isset($datos['DNI_Em']) ? $datos['DNI_Em'] : null;
        $IDGabineteCategoria = isset($datos['IDGabineteCategoria']) ? $datos['IDGabineteCategoria'] : null;
        $IDTipoInst = isset($datos['IDTipoInst']) ? $datos['IDTipoInst'] : null;

        if ($IDContrato !== null) {
            $cliente = $this->model->getBusqueda($DNI_cli);
            if (!empty($cliente)) {
                $mensaje = "El cliente con DNI:" . $DNI_cli . " " . "ya cuenta con un contrato vigente," .
                    "por favor ingrese otro cliente";
            } else {
                if (
                    $this->model->insert([
                        'IDContrato' => $IDContrato,
                        'Fecha_Con' => $Fecha_Con,
                        'NumeroRadicado_Con' => $NumeroRadicado_Con,
                        'PuntoInstalacion_Con' => $PuntoInstalacion_Con,
                        'numSum' => $numSum,
                        'estado' => $estado,
                        'IDDomicilio' => $IDDomicilio,
                        'DNI_cli' => $DNI_cli,
                        'DNI_Em' => $DNI_Em,
                        "IDGabineteCategoria" => $IDGabineteCategoria,
                        "IDTipoInst" => $IDTipoInst
                    ])
                ) {
                    $mensaje = "Se registro el contrato";
                } else {
                    $mensaje = "El contrato no puede ser registrado";
                }
            }
            echo json_encode($mensaje);
        } else {
            echo "Error: Datos incompletos";
        }
    }
}
