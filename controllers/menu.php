<?php

class Menu extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    function render()
    {
        $this->view->render('menu/menu');
        var_dump($_SESSION);
    }

}