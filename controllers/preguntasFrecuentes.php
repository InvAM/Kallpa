<?php
class preguntasFrecuentes extends Controller
{
    function __construct()
    {
        parent::__construct();
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
        $this->view->render('preguntasFrecuentes/formPreguntasFrecuentes');
    }

}