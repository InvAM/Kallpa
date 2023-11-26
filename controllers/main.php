<?php
class Main extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        session_start();
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $this->view->nombrecliente = $username;
        } else {
            $this->view->nombrecliente = null;
        }
    }

    function render()
    {
        $this->view->render('PortalWebKallpa/portalWebKallpa');
    }
}