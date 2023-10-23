<?php
class RegistrarMateriales extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->render('registrarMateriales/formRegistrarMateriales');
    }
}