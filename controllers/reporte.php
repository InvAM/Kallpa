<?php
class reporte extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->render('reportes/formReportes');
    }
}