<?php
class GenerarOrdenH extends Controller
{
    public function __construct()
    {
        parent::__construct();


    }
    function render()
    {
        $this->view->render('generarOrdenH/formGenerarOrdenH');
    }

}