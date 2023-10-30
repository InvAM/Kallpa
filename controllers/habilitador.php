<?php
class Habilitador extends Controller
{
    public function __construct()
    {
        parent::__construct();


    }

    function render()
    {
        $this->view->render('asignarHabilitador/formAsignarHabilitador');
    }


}