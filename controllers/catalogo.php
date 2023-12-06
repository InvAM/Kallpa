<?php
class Catalogo extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('producto');
        $this->view->mensaje = "";
        session_start();
        if (isset($_SESSION['nombrecliente'])) {
            $nombrecliente = $_SESSION['nombrecliente'];
            $this->view->nombrecliente = $nombrecliente;
        } else {
            $this->view->nombrecliente = null;
        }

    }

    function render()
    {
        $producto = $this->model->getP();

        $this->view->producto = $producto;
        $this->view->render('portalCatalogo/portalCatalogo');
    }
    function eliminarDelCarrito()
    {
        $response = array();

        if (isset($_SESSION["carrito"])) {
            if (isset($_POST["nombre"])) {
                $nombreProducto = $_POST["nombre"];

                if (isset($_SESSION["carrito"][$nombreProducto])) {
                    unset($_SESSION["carrito"][$nombreProducto]);


                    $response['success'] = true;
                    $response['message'] = 'Producto eliminado del carrito';

                    header('Content-Type: application/json');
                    echo json_encode($response);
                    exit;
                }
            }
        }


        $response['success'] = false;
        $response['message'] = 'No se pudo eliminar el producto';
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    function agregarCarrito()
    {
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true);
        $response = array();

        if ($datos) {
            $producto["nombre"] = $datos["nombre"];
            $producto["cuota"] = $datos["cuota"];
            $producto["precio1"] = $datos["precio1"];
            $producto["precio2"] = $datos["precio2"];
            $producto["imagen"] = $datos["imagenBase64"];
            $_SESSION["carrito"][$producto["nombre"]] = $producto;
            $response['success'] = true;
            $response['message'] = 'Producto agregado al carrito';
        } else {
            $response['success'] = false;
            $response['message'] = 'No se pudo agregar el producto';
        }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}