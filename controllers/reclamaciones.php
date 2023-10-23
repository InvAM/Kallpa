<?php
class reclamaciones extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->render('reclamaciones/formLReclamaciones');
    }
}