<?php
class RegistrarMateriales extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('material');
        $this->view->mensaje = "";

    }
    function render()
    {
        $material = $this->model->get();

        $this->view->material = $material;
        $this->view->render('registrarMateriales/formRegistrarMateriales');
    }

    function registrarMateriales()
    {
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true);
        var_dump($datosJson);
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
                $mensaje = "Se registro correctamente";

            }
        }
    }
}