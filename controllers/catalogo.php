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
        $producto["nombre"] = $_POST["nombre"];
        $producto["detalle"] = $_POST["detalle"];
        $producto["precio"] = $_POST["precio"];
        $_SESSION["carrito"][$producto["nombre"]] = $producto;
        header("location:verCarrito");
    }
}