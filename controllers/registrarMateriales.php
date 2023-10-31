<?php
class RegistrarMateriales extends Controller
{
    function __construct()
    {
        parent::__construct();

    }
    function render()
    {
        $this->view->render('registrarMateriales/formRegistrarMateriales');
    }
}