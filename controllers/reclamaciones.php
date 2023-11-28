<?php
class reclamaciones extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('reclamacion');

    }
    function render()
    {
        $this->view->render('reclamaciones/formLReclamaciones');
    }

    function registrarReclamaciones()
    {
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true);

        $dni_r = isset($datos['DNI_cli']) ? $datos['DNI_cli'] : null;
        $nombre_r = isset($datos['nombre']) ? $datos['nombre'] : null;
        $correo_r = isset($datos['correo']) ? $datos['correo'] : null;
        $domicilio_r = isset($datos['domicilio']) ? $datos['domicilio'] : null;
        $telefono_r = isset($datos['telefono']) ? $datos['telefono'] : null;
        $tipo_servicio_r = isset($datos['tiposervicio']) ? $datos['tiposervicio'] : null;
        $monto_reclamado_r = isset($datos['montoreclamado']) ? $datos['montoreclamado'] : null;
        $descripcion_r = isset($datos['descripcion']) ? $datos['descripcion'] : null;
        $tipo_reclamacion_r = isset($datos['tiporeclamacion']) ? $datos['tiporeclamacion'] : null;
        $detalle_r = isset($datos['detalle']) ? $datos['detalle'] : null;
        $pedido_r = isset($datos['pedido']) ? $datos['pedido'] : null;

        var_dump($datos);
        
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