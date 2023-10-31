<?php
class Tecnico extends Controller
{
    public function __construct()
    {
        parent::__construct();


    }
    function render()
    {
        $this->view->render('asignarTecnico/formAsignarTecnico');
    }


}