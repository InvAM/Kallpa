<?php
class InfoKallpa extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render('infoKallpa/infoKallpa');
        //echo "<p>Nuevo Controlador main</p>";
    }


}