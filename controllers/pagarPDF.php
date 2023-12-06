<?php
class pagarPDF extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
    }
    function render()
    {
        $this->view->render('pagar/pagarPdf');
    }

    function enviarPDF()
    {
        session_start();
        $inputJSON = file_get_contents('php://input');
        $data = json_decode($inputJSON, true);
        $response = array();

        if (empty($data)) {
            $response['success'] = false;
            $response['message'] = 'NO EXISTE PDF';
        } else {
            $_SESSION['datosParaImprimir'] = $data;
            $response['success'] = true;
            $response['message'] = 'EXISTE PDF';
        }

        // Envía la respuesta JSON
        echo json_encode($response);
        exit; // Importante salir para evitar más salida que podría afectar la generación del PDF
    }



}