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
        if ($this->model->insert(['DNI_Em_reg' => $dni, 'Nombre_Em_reg' => $nom, 'Apellido_Em_reg' => $ape, 'Celular_Em_reg' => $cel, 'IDCategoria_reg' => $categoria])) {
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
        session_start();
        $dni = $_SESSION['dni_verEmpleado'];
        $nom = $_POST['Nombre_Em_reg'];
        $ape = $_POST['Apellido_Em_reg'];
        $cel = $_POST['Celular_Em_reg'];
        $categoria = $_POST['IDCategoria_reg'];

        unset($_SESSION['dni_verEmpleado']);
        if ($this->model->update(['DNI_Em_reg' => $dni, 'Nombre_Em_reg' => $nom, 'Apellido_Em_reg' => $ape, 'Celular_Em_reg' => $cel, 'IDCategoria_reg' => $categoria])) {
            //actualizar empleado
            $empleado = new Empleado();
            $empleado->DNI_Em = $dni;
            $empleado->Nombre_Em = $nom;
            $empleado->Apellido_Em = $ape;
            $empleado->Celular_Em = $cel;
            $empleado->IDCategoria = $categoria;

            $this->view->empleado = $empleado;
            $this->view->mensaje = "Empleado Actualizado Correctamente";

        } else {
            //msg de error
            $this->view->mensaje = "No se puedo actualizar em empleado";
        }
        $this->view->render('registrarEmpleado/formDetalleEmpleado');
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
