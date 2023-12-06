<?php
class controlpdf extends Controller{

    public function __construct(){
        parent::__construct();
        $this->loadModel('contrato');
        $this->view->mensaje = "";
    }

    function render(){

        $this->view->render('pdf');
    }

    function enviarPDF(){
    
        session_start();

        // Recibir datos JSON desde la solicitud POST
        $inputJSON = file_get_contents('php://input');
        $data = json_decode($inputJSON, true);
        $response = array();
        // Verificar si los datos se recibieron correctamente
        if (empty($data)) {
            $response['success'] = false;
            $response['message'] = 'NO EXISTE PDF';
        }else{
            $IDContrato = $data['IDContrato'];
            $contrato=$this->model->getPDF($IDContrato);
            $_SESSION['datosParaImprimir']=$contrato;
            
            // Si deseas enviar una respuesta JSON al cliente, puedes hacerlo así
            $response['success'] = true;
            $response['message'] = 'EXISTE PDF';
        }
        echo json_encode($response);
    }
}