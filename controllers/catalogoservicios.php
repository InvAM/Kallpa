<?php
class CatalogoServicios extends Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->view->render('portalCatalogoServicios/portalCatalogoServicios');
    
    }
}