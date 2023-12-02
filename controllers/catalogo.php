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

    function agregarCarrito()
    {
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true);
        $response = array();

        $producto["nombre"] = $datos["nombre"];
        $producto["cuota"] = $datos["cuota"];
        $producto["precio1"] = $datos["precio1"];
        $producto["precio2"] = $datos["precio2"];
        $_SESSION["carrito"][$producto["nombre"]] = $producto;
        header("location:carrito");
    }
}