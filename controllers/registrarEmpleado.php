<?php
class RegistrarEmpleado extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('empleado');
        $this->view->render('registrarEmpleado/formRegistrarEmpleado');
    }

    function registrarNuevoEmpleado()
    {
        $dni = $_POST['DNI_Em_reg'];
        $nom = $_POST['Nombre_Em_reg'];
        $ape = $_POST['Apellido_Em_reg'];
        $cel = $_POST['Celular_Em_reg'];
        $categoria = $_POST['IDCategoria_reg'];

        $this->model->insert(['DNI_Em_reg' => $dni, 'Nombre_Em_reg' => $nom, 'Apellido_Em_reg' => $ape, 'Celular_Em_reg' => $cel, 'IDCategoria_reg' => $categoria]);
    }
}