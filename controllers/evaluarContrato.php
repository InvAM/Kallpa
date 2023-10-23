<?php
class EvaluarContrato extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render('evaluarContrato/formEvaluarContrato');
        //echo "<p>Nuevo Controlador main</p>";
    }


}