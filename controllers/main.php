<?php
class Main extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render('login/formLoginP');
        //echo "<p>Nuevo Controlador main</p>";
    }

    function saludo()
    {
        //echo "<p>Ejecutaste el metodo Saludo</p>";
    }
}