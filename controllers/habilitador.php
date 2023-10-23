<?php
class Habilitador extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render('asignarHabilitador/formAsignarHabilitador');
        //echo "<p>Nuevo Controlador main</p>";
    }


}