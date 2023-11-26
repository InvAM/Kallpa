<?php
class reclamaciones extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel("reclamacion");

    }
    function render()
    {
        $this->view->render('reclamaciones/formLReclamaciones');
    }

    function registrarReclamaciones()
    {
        $nombre = $_POST['nombre_r'];
        $dni = $_POST['dni_r'];
        $correo = $_POST['correo_r'];
        $domicilio = $_POST['domicilio_r'];
        $telefono = $_POST['telefono_r'];
        $tipo_servicio = $_POST['tipo_servicio_r'];
        $monto_reclamado = $_POST['monto_reclamado_r'];
        $descripcion = $_POST['descripcion_r'];
        $tipo_reclamacion = $_POST['tipo_reclamacion_r'];
        $detalle = $_POST['detalle_r'];
        $pedido = $_POST['pedido_r'];
        $mensaje = "";
        if (
            $this->model->insert([
                'nombre_r' => $nombre,
                'dni_r' => $dni,
                'correo_r' => $correo,
                'domicilio_r' => $domicilio,
                'telefono_r' => $telefono,
                'tipo_servicio_r' => $tipo_servicio,
                'monto_reclamado_r' => $monto_reclamado,
                'descripcion_r' => $descripcion,
                'tipo_reclamacion_r' => $tipo_reclamacion,
                'detalle_r' => $detalle,
                'pedido_r' => $pedido
            ])
        ) {
            $mensaje = 'Registrado';
            header("Location:" . constant('URL') . 'reclamaciones');
        }
        $this->render();
    }

}