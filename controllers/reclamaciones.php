<?php
class reclamaciones extends Controller
{
    function __construct()
    {
        parent::__construct();

    }
    function render()
    {
        $this->view->render('reclamaciones/formLReclamaciones');
    }

}