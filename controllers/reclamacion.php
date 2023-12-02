<?php
include_once "models/clientemodel.php";
class reclamacion extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('reclamaciones');
        $this->clientes = new ClienteModel();
        $this->view->mensaje = "";
    }
    function render()
    {
        $this->view->render('reclamaciones/formLReclamaciones');
    }

    function registrarReclamaciones()
    {
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true);

        $dni_r = isset($datos['dni_r']) ? $datos['dni_r'] : null;
        $nombre_r = isset($datos['nombre_r']) ? $datos['nombre_r'] : null;
        $correo_r = isset($datos['correo_r']) ? $datos['correo_r'] : null;
        $domicilio_r = isset($datos['domicilio_r']) ? $datos['domicilio_r'] : null;
        $telefono_r = isset($datos['telefono_r']) ? $datos['telefono_r'] : null;
        $tipo_servicio_r = isset($datos['tipo_servicio_r']) ? $datos['tipo_servicio_r'] : null;
        $monto_reclamado_r = isset($datos['monto_reclamado_r']) ? $datos['monto_reclamado_r'] : null;
        $descripcion_r = isset($datos['descripcion_r']) ? $datos['descripcion_r'] : null;
        $tipo_reclamacion_r = isset($datos['tipo_reclamacion_r']) ? $datos['tipo_reclamacion_r'] : null;
        $detalle_r = isset($datos['detalle_r']) ? $datos['detalle_r'] : null;
        $pedido_r = isset($datos['pedido_r']) ? $datos['pedido_r'] : null;
        
        $cliente = $this->clientes->getEspecial($dni_r);
            if (!empty($cliente)){
                $mensaje = "Lo sentimos no puede registrar una reclamación porque no es un cliente";
            } else {
                if($dni_r !== null){
                    
                        if (
                            $this->model->insert([
                                'dni_r' => $dni_r,
                                'nombre_r' => $nombre_r,
                                'correo_r' => $correo_r,
                                'domicilio_r' => $domicilio_r,
                                'telefono_r' => $telefono_r,
                                'tipo_servicio_r' => $tipo_servicio_r,
                                'monto_reclamado_r' => $monto_reclamado_r,
                                'descripcion_r' => $descripcion_r,
                                'tipo_reclamacion_r' => $tipo_reclamacion_r,
                                'detalle_r' => $detalle_r,
                                'pedido_r' => $pedido_r
                            ])
                        ) {
                            $mensaje = "Registrado";
                        } else {
                            $mensaje = "La reclamación no puede registrarse";
                        }
                        echo json_encode($mensaje);
                } else {
                    echo "Error: Datos incompletos";
                }
            }
    }

}