<?php
class Tecnico extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render('asignarTecnico/formAsignarTecnico');
        //echo "<p>Nuevo Controlador main</p>";
    }


}