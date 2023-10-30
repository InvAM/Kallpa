<?php
class ReporteContrato extends Controller
{
    function __construct()
    {
        parent::__construct();

    }
    function render()
    {
        $this->view->render('reporteContrato/reporteContrato');
    }
}