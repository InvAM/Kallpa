<?php
class ReporteCliente extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->render('reporteCliente/reporteCliente');
    }
}