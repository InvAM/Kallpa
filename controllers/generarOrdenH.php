<?php
class GenerarOrdenH extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render('generarOrdenH/formGenerarOrdenH');
        //echo "<p>Nuevo Controlador main</p>";
    }


}