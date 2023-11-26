<?php
class Main extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        session_start();
        if (isset($_SESSION['nombrecliente'])) {
            $nombrecliente = $_SESSION['nombrecliente'];
            $this->view->nombrecliente = $nombrecliente;
        } else {
            $this->view->nombrecliente = null;
        }
    }

    function render()
    {
        $this->view->render('PortalWebKallpa/portalWebKallpa');
    }
}