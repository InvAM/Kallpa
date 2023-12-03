<?php
class controlpdf extends Controller{

    public function __construct(){
        parent::__construct();
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
            $_SESSION['datosParaImprimir'] = $data;

            // Puedes acceder a los datos ahora, por ejemplo:
            $IDContrato = $data['IDContrato'];
            $Fecha_Con = $data['Fecha_Con'];
            $DNI_cli = $data['DNI_cli'];
            $NumeroRadicado_Con = $data['NumeroRadicado_Con'];
            $PuntoInstalacion_Con = $data['PuntoInstalacion_Con'];
            $numSum = $data['numSum'];
            $estado = $data['estado'];
            $IDDomicilio = $data['IDDomicilio'];
            

    
            // Aquí puedes hacer lo que necesites con los datos (por ejemplo, generar un PDF)
    
            // Si deseas enviar una respuesta JSON al cliente, puedes hacerlo así
            $response['success'] = true;
            $response['message'] = 'EXISTE PDF';
            echo json_encode($response);
        } 
    }
}