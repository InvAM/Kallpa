<?php
class Catalogo extends Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->view->render('portalCatalogo/portalCatalogo');
    
    }
}