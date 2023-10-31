<?php
class Menu extends Controller
{
    public function __construct()
    {
        parent::__construct();


    }
    function render()
    {
        $this->view->render('menu/menu');
    }

}