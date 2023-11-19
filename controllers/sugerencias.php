<?php
class sugerencias extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel("sugerencia");

    }
    function render()
    {
        $this->view->render('sugerencia/formBSugerencias');
    }

    function registrarSugerencia(){
        $nombres = $_POST['nombres_s'];
        $apellidos = $_POST['apellidos_s'];
        $email = $_POST['email_s'];
        $comentario = $_POST['comentario_s'];

        if(
            $this->model->insert([
                'nombres_s'=> $nombres,
                'apellidos_s'=> $apellidos,
                'email_s'=> $email,
                'comentario_s'=> $comentario
            ])
        ){
            $mensaje='Registrado';
            header("Location:".constant('URL').'sugerencias');
        }

        $this->render();
    }

}