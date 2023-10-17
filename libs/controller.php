<?php
class Controller
{
    function __construct()
    {
        $this->vista = new View();
    }

    function loadModel($model)
    {
        $url = 'modelo/' . $model . 'model.php';
        if (file_exists($url)) {
            require_once $url;

            $modelName = $model . 'Model';
            $this->model = new $modelName();
        }
    }
}
?>