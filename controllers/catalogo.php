<?php
class Catalogo extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('producto');
        $this->view->mensaje="";
    }

    function render()
    {
        $producto = $this->model->get();
        $this->view->producto=$producto;
        $this->view->render('portalCatalogo/portalCatalogo');
    }

}