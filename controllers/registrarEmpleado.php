<?php
class RegistrarEmpleado extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('empleado');
        $this->view->mensaje = "";

    }
    function render()
    {
        $empleado = $this->model->get();
        $this->view->empleado = $empleado;
        $this->view->render('registrarEmpleado/formRegistrarEmpleado');
    }
    function registrarNuevoEmpleado()
    {
        $dni = $_POST['DNI_Em_reg'];
        $nom = $_POST['Nombre_Em_reg'];
        $ape = $_POST['Apellido_Em_reg'];
        $cel = $_POST['Celular_Em_reg'];
        $categoria = $_POST['IDCategoria_reg'];
        $mensaje = "";
        if (
            $this->model->insert([
                'DNI_Em_reg' => $dni,
                'Nombre_Em_reg' => $nom,
                'Apellido_Em_reg' => $ape,
                'Celular_Em_reg' => $cel,
                'IDCategoria_reg' => $categoria
            ])
        ) {
            $mensaje = "Nuevo empleado creado";
        } else {
            $mensaje = "Empleado ya existente";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
    }

    function verEmpleado($param = null)
    {
        $dniEmpleado = $param[0];
        $empleado = $this->model->getById($dniEmpleado);

        session_start();
        $_SESSION['dni_verEmpleado'] = $empleado->DNI_Em;
        $this->view->empleado = $empleado;
        $this->view->mensaje = "";
        $this->view->render("registrarEmpleado/formDetalleEmpleado");
    }

    function actualizarEmpleado()
    {

        // Obtén los datos del formulario
        $dni = $_POST['DNI_Em_reg'];
        $nom = $_POST['Nombre_Em_reg'];
        $ape = $_POST['Apellido_Em_reg'];
        $cel = $_POST['Celular_Em_reg'];
        $categoria = $_POST['IDCategoria_reg'];

        // Asegúrate de que los datos estén presentes y válidos
        if (!empty($dni) && !empty($nom) && !empty($ape) && !empty($cel) && !empty($categoria)) {
            // Actualiza el empleado en el modelo
            if ($this->model->update(['DNI_Em_reg' => $dni, 'Nombre_Em_reg' => $nom, 'Apellido_Em_reg' => $ape, 'Celular_Em_reg' => $cel, 'IDCategoria_reg' => $categoria])) {
                // Crea un objeto Empleado con los datos actualizados
                $empleado = new Empleado();
                $empleado->DNI_Em = $dni;
                $empleado->Nombre_Em = $nom;
                $empleado->Apellido_Em = $ape;
                $empleado->Celular_Em = $cel;
                $empleado->IDCategoria = $categoria;

                // Define la URL de redirección
                $redirectUrl = constant('URL') . 'registrarEmpleado'; // Cambia 'tu_pagina_actual' por la URL real

                // Devuelve una respuesta JSON con éxito, la URL de redirección y el objeto Empleado
                echo json_encode(['success' => true, 'redirect' => $redirectUrl, 'empleado' => $empleado, 'mensaje' => 'Empleado Actualizado Correctamente']);
                return;
            }
        }
        echo json_encode(['success' => false, 'mensaje' => 'No se pudo actualizar el empleado']);
    }


    function eliminarEmpleado($param = null)
    {
        $dni = $param[0];
        if ($this->model->delete($dni)) {

            $this->view->mensaje = "Empleado Eliminado Correctamente";

        } else {
            //msg de error
            $this->view->mensaje = "No se puedo eliminar em empleado";
        }
        $this->render();
    }

}
