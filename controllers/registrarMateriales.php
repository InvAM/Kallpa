<?php
class RegistrarMateriales extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('material');
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
        $material = $this->model->get();

        $this->view->material = $material;
        $this->view->render('registrarMateriales/formRegistrarMateriales');
    }

    function registrarMateriales()
    {    
        $cont= 0;
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true);
        foreach ($datos as $material) {
            // Accede a las propiedades del objeto, por ejemplo:
            $id = $material['id'];
            $idcontrato = $material['idcontrato'];
            $idetapa = $material['idetapa'];
            $cantidad = $material['cantidad'];

            if (
                $this->model->insert([
                    'idmaterial' => $id,
                    'idcontrato' => $idcontrato,
                    'idetapa' => $idetapa,
                    'cantidad' => $cantidad
                ])
            ) {
                $cont=$cont+1;
            }
        }

        
        if($cont== count($datos)){
            $mensaje="Registro exitoso";
         }
         echo json_encode($mensaje);
    }
}