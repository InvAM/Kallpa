<?php

class RegistrarMate extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('material');
        session_start();
        if (!isset($_SESSION['dni'])) {
            header("Location:" . constant('URL') . 'Login');
            exit();
        }
    }

    public function render()
{
    $this->view->materiales = $this->model->get();  // Asigna los materiales a la vista
    $this->view->render('registrarMaterial/formRegistrarMate');
}

    public function registrar()
    {
        try {
            $datosJson = file_get_contents("php://input");
            $datos = json_decode($datosJson, true);
            $response = array();

            if ($datos !== null) {
                $idmateriales = isset($datos['idmateriales']) ? $datos['idmateriales'] : null;
                $nombre_materiales = isset($datos['nombre_materiales']) ? $datos['nombre_materiales'] : null;
                $Unidad_Ma = isset($datos['UnidadMedida_Ma']) ? $datos['UnidadMedida_Ma'] : null;
                $stock_materiales = isset($datos['stock_materiales']) ? $datos['stock_materiales'] : null;

                if ($idmateriales !== null && $nombre_materiales !== null && $Unidad_Ma !== null && $stock_materiales !== null) {
                    $result = $this->model->insertmateriales([
                        'IDMaterial' => $idmateriales,
                        'Nombre_Ma' => $nombre_materiales,
                        'UnidadMedida_Ma' => $Unidad_Ma,
                        'Stock_Ma' => $stock_materiales,
                    ]);

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = 'Material registrado con éxito';
                    } else {
                        $response['success'] = false;
                        $response['message'] = 'No se pudo registrar el material, verifique la información ingresada';
                    }
                } else {
                    $response['success'] = false;
                    $response['message'] = 'Faltan datos obligatorios';
                }
            } else {
                $response['success'] = false;
                $response['message'] = 'Datos no válidos';
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
        }
    }
    public function actualizarMaterial()
    {
        try {
            $datosJson = file_get_contents("php://input");
            $datos = json_decode($datosJson, true);
            $response = array();

            if ($datos !== null) {
                $idmateriales = isset($datos['IDMaterial']) ? $datos['IDMaterial'] : null;
                $nombre_materiales = isset($datos['Nombre_Ma']) ? $datos['Nombre_Ma'] : null;
                $Unidad_Ma = isset($datos['UnidadMedida_Ma']) ? $datos['UnidadMedida_Ma'] : null;
                $stock_materiales = isset($datos['Stock_Ma']) ? $datos['Stock_Ma'] : null;
                if ($idmateriales !== null) {
                    $result = $this->model->actualizarMaterial([
                        'IDMaterial' => $idmateriales,
                        'Nombre_Ma' => $nombre_materiales,
                        'UnidadMedida_Ma' => $Unidad_Ma,
                        'Stock_Ma' => $stock_materiales,
                    ]);

                    if ($result) {
                        $response['success'] = true;
                        $response['message'] = 'Material actualizado con éxito';
                    } else {
                        $response['success'] = false;
                        $response['message'] = 'No se pudo actualizar el material, verifique la información ingresada';
                    }
                } else {
                    $response['success'] = false;
                    $response['message'] = 'Faltan datos obligatorios';
                }
            } else {
                $response['success'] = false;
                $response['message'] = 'Datos no válidos';
            }
            header('Content-Type: application/json');
            echo json_encode($response);
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
        }
    }
    public function eliminarmaterial()
{
    $json_data = file_get_contents("php://input");
    $data = json_decode($json_data, true);
    $response = array();

    if (isset($data['idmateriales'])) {
        $idMaterial = $data['idmateriales'];

        try {
            if ($this->model->delete($idMaterial)) {
                $response['success'] = true;
                $response['message'] = "Material eliminado correctamente";
            } else {
                $response['success'] = false;
                $response['message'] = "Error al eliminar el material, asegúrese de que no esté en uso en algún contrato";
            }
        } catch (PDOException $e) {
            $response['success'] = false;
            $response['message'] = "Error en la base de datos: " . $e->getMessage();
        }

        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }
}

}
?>
