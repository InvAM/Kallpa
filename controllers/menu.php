<?php
class Menu extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render('menu/menu');
        //echo "<p>Nuevo Controlador main</p>";
    }


}