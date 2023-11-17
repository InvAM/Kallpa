<?php
class preguntasFrecuentes extends Controller
{
    function __construct()
    {
        parent::__construct();

    }
    function render()
    {
        $this->view->render('preguntasFrecuentes/formPreguntasFrecuentes');
    }

}