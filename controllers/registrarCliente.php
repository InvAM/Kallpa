<?php
class RegistrarCliente extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('cliente');
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
        $cliente = $this->model->get();
        $this->view->cliente = $cliente;

        $this->view->render('registrarCliente/formRegistrarCliente');
    }
    function registrarNuevoCliente()
    {
        $dniC = $_POST['DNI_cli_reg'];
        $nomC = $_POST['Nombre_cli_reg'];
        $apeC = $_POST['Apellido_cli_reg'];
        $cel = $_POST['Celular_cli_reg'];
        $fecha = $_POST['FechaNacimiento:_cli_reg'];
        $genero = $_POST['IDGenero_reg'];
        $nacionalidad = $_POST['IDNacionalidad_reg'];
        $estadoC = $_POST['IDEstadoCivil_reg'];
        $mensaje = "";
        if (
            $this->model->insert([
                'DNI_cli_reg' => $dniC,
                'Nombre_cli_reg' => $nomC,
                'Apellido_cli_reg' => $apeC,
                'Celular_cli_reg' => $cel,
                'FechaNacimiento:_cli_reg' => $fecha,
                'IDGenero_reg' => $genero,
                'IDNacionalidad_reg' => $nacionalidad,
                'IDEstadoCivil_reg' => $estadoC
            ])
        ) {
            $mensaje = "Nuevo cliente creado";
        } else {
            $mensaje = "Cliente ya existente";
        }
        $this->view->mensaje = $mensaje;
        $this->render();
    }

    function verCliente($param = null)
    {
        $dniCliente = $param[0];
        $cliente = $this->model->getById($dniCliente);

        session_start();
        $_SESSION['dni_verCliente'] = $cliente->DNI_cli;
        $this->view->cliente = $cliente;
        $this->view->mensaje = "";
        $this->view->render("registrarCliente/formDetalleCliente");
    }

    function actualizarCliente()
    {
        //Obtenemos los datos del form
        $dniC = $_POST['DNI_cli_reg'];
        $nomC = $_POST['Nombre_cli_reg'];
        $apeC = $_POST['Apellido_cli_reg'];
        $cel = $_POST['Celular_cli_reg'];
        $fecha = $_POST['FechaNacimiento:_cli_reg'];
        $genero = $_POST['IDGenero_reg'];
        $nacionalidad = $_POST['IDNacionalidad_reg'];
        $estadoC = $_POST['IDEstadoCivil_reg'];

        //Asegurar que los datos esten presentes y validos
        if (!empty($dniC) && !empty($nomC) && !empty($apeC) && !empty($cel) && !empty($fecha) && !empty($genero) && !empty($nacionalidad) && !empty($estadoC)) {
            //Actualiza el cliente en el modelo
            if (
                $this->model->update([
                    'DNI_cli_reg' => $dniC,
                    'Nombre_cli_reg' => $nomC,
                    'Apellido_cli_reg' => $apeC,
                    'Celular_cli_reg' => $cel,
                    'FechaNacimiento:_cli_reg' => $fecha,
                    'IDGenero_reg' => $genero,
                    'IDNacionalidad_reg' => $nacionalidad,
                    'IDEstadoCivil_reg' => $estadoC
                ])
            ) {
                //Crea un objeto Cliente con los datos actualizados
                $cliente = new Cliente();
                $cliente->DNI_cli = $dniC;
                $cliente->Nombre_cli = $nomC;
                $cliente->Apellido_cli = $apeC;
                $cliente->Celular_cli = $cel;
                $cliente->FechaNacimiento_cli = $fecha;
                $cliente->IDGenero = $genero;
                $cliente->IDNacionalidad = $nacionalidad;
                $cliente->IDEstadoCivil = $estadoC;

                //Define la URL de redireccion 
                $redirectUrl = constant('URL') . 'registrarCliente';

                echo json_encode(['success' => true, 'redirect' => $redirectUrl, 'cliente' => $cliente, 'mensaje' => 'Cliente Actializado Correctamente']);
                return;
            }
        }
        echo json_encode(['success' => false, 'mensaje' => 'No se pudo actualizar el cliente']);
    }

    function eliminarCliente($param = null)
    {
        $dniC = $param[0];
        if ($this->model->delete($dniC)) {
            $this->view->mensaje = "Cliente Eliminado Correctamente";
        } else {
            $this->view->mensaje = "No se puede eliminar el Cliente";
        }
        $this->render();
    }
}