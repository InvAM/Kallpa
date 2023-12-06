<?php
class contactanos extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel("contacto");
    }

    function render()
    {
        $this->view->render('infoKallpa/infoKallpa');
    }

    function registrarContacto(){
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true);

        $nombre = isset($datos['nombre']) ? $datos['nombre'] : null;
        $celular = isset($datos['celular']) ? $datos['celular'] : null;
        $correo = isset($datos['correo']) ? $datos['correo'] : null;
        $mensaje = isset($datos['mensaje']) ? $datos['mensaje'] : null;
        $direccion = isset($datos['direccion']) ? $datos['direccion'] : null;

        if ($nombre !== null) {
            if (
                $this->model->insert([
                    'nombre' => $nombre,
                    'celular' => $celular,
                    'correo' => $correo,
                    'mensaje' => $mensaje,
                    'direccion' => $direccion
                ])
            ) {
                $mensaje = "El contacto de " . $nombre . " ha sido registrado con éxito";
            } else {
                $mensaje = "Error al registrar";
            }
            echo json_encode(['mensaje' => $mensaje]);
        } else {
            echo "Error: Datos incompletos";
        }
    }
}