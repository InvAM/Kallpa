<?php
class InfoKallpa extends Controller
{
    public function __construct()
    {
        parent::__construct();


    }
    function render()
    {
        $this->view->render('infoKallpa/infoKallpa');
    }


}