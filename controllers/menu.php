<?php

class Menu extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        if (!isset($_SESSION['dni'])) {
            header("Location:" . constant('URL') . 'login');
            exit();
        }
    }
    function render()
    {
        $this->view->render('menu/menu');

    }

}