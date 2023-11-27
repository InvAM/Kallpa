<?php

include_once "models/categoriaempleadomodel.php";
include_once "models/credencialesempleadomodel.php";
class RegistrarEmpleado extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('empleado');
        $this->categoria = new Categoriaempleadomodel();
        $this->credenciales = new CredencialesEmpleadoModel();
        $this->view->mensaje = "";


        session_start();
        if (!isset($_SESSION['dni'])) {
            header("Location:" . constant('URL') . 'login');
            exit();
        }

    }
    function render()
    {
        $categoria = $this->categoria->get();
        $empleado = $this->model->get();
        $this->view->categoria = $categoria;
        $this->view->empleado = $empleado;
        $this->view->render('registrarEmpleado/formRegistrarEmpleado');
    }
    public function registrarNuevoEmpleado()
    {
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true);
        $response = array();

        if ($datos !== null) {
            $dni = isset($datos['DNI_Em']) ? $datos['DNI_Em'] : null;
            $nombre = isset($datos['Nombre_Em']) ? $datos['Nombre_Em'] : null;
            $apellido = isset($datos['Apellido_Em']) ? $datos['Apellido_Em'] : null;
            $celular = isset($datos['Celular_Em']) ? $datos['Celular_Em'] : null;
            $categoria = isset($datos['IDCategoria']) ? $datos['IDCategoria'] : null;

            if ($dni !== null && $nombre !== null && $apellido !== null && $celular !== null && $categoria !== null) {
                if (
                    $this->model->insert([
                        'DNI_Em' => $dni,
                        'Nombre_Em' => $nombre,
                        'Apellido_Em' => $apellido,
                        'Celular_Em' => $celular,
                        'IDCategoria' => $categoria
                    ])
                ) {
                    $response['success'] = true;
                    $response['message'] = 'Empleado registrado con éxito';
                } else {
                    $response['success'] = false;
                    $response['message'] = 'No se pudo registrar al empleado';
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
    }
    function actualizarEmpleado()
    {

        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true);
        $response = array();

        if ($datos !== null) {
            $dni = isset($datos['DNI_Em']) ? $datos['DNI_Em'] : null;
            $nombre = isset($datos['Nombre_Em']) ? $datos['Nombre_Em'] : null;
            $apellido = isset($datos['Apellido_Em']) ? $datos['Apellido_Em'] : null;
            $celular = isset($datos['Celular_Em']) ? $datos['Celular_Em'] : null;
            $categoria = isset($datos['IDCategoria']) ? $datos['IDCategoria'] : null;

            if ($dni !== null && $nombre !== null && $apellido !== null && $celular !== null && $categoria !== null) {
                if (
                    $this->model->update([
                        'DNI_Em' => $dni,
                        'Nombre_Em' => $nombre,
                        'Apellido_Em' => $apellido,
                        'Celular_Em' => $celular,
                        'IDCategoria' => $categoria
                    ])
                ) {
                    $response['success'] = true;
                    $response['message'] = 'Empleado actualizado con éxito';
                } else {
                    $response['success'] = false;
                    $response['message'] = 'No se pudo actualizar al empleado';
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
    }
    function eliminarEmpleado()
    {
        $json_data = file_get_contents("php://input");
        $data = json_decode($json_data, true);
        $response = array();

        if (isset($data['dni'])) {
            $dni = $data['dni'];

            if ($this->model->delete($dni)) {
                $response['success'] = true;
                $response['message'] = "Empleado eliminado correctamente";

            } else {
                $response['success'] = false;
                $response['message'] = 'No se puede eliminar un empleado que tiene un contrato asignado';

            }

            header('Content-Type: application/json');
            echo json_encode($response);
            exit();
        }
    }

    function registrarCredenciales()
    {
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true);
        $response = array();
        if ($datos !== null) {

            $dni = isset($datos['DNI_Em']) ? $datos['DNI_Em'] : null;
            $nombreusuario = isset($datos['nombreusuario']) ? $datos['nombreusuario'] : null;
            $password = isset($datos['password']) ? $datos['password'] : null;

            if ($dni !== null && $nombreusuario !== null && $password !== null) {
                if ($this->credenciales->insert(['DNI_Em' => $dni, 'nombreusuario' => $nombreusuario, 'password' => $password])) {
                    $response['success'] = true;
                    $response['message'] = 'Empleado registrado con éxito';
                } else {
                    $response['success'] = false;
                    $response['message'] = 'No se pudo registrar al empleado';
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
    }

}
