<?php
class CatalogoServicios extends Controller
{
    function __construct()
    {
        parent::__construct();
        
        $this->view->render('portalCatalogoServicios/portalCatalogoServicios');
    
    }

    function render()
    {
        $this->view->render('portalCatalogoServicios/portalCatalogoServicios');
    }

}