<?php
class GenerarOrdenI extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render('generarOrdenI/formGenerarOrdenI');
        //echo "<p>Nuevo Controlador main</p>";
    }


}