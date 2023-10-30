<?php
class login extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->render('login/formLoginP');
        
    }

   
}