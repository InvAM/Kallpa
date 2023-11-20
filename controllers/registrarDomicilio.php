<?php
class RegistrarDomicilio extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->loadModel('domicilio');
        $this->view->mensaje = "";
    }
    function render()
    {
        $domicilio = $this->model->get();
        $this->view->domicilio = $domicilio;
        $this->view->render('registrarDomicilio/formRegistrarDomicilio');
    }
    function registrarNuevoDomicilio(){
        $id=$_POST['IDDomicilio_reg'];
        $direc = $S_POST['Direccion_Dom_reg'];
        $inte = $S_POST['Interior_Dom_reg'];
        $piso = $S_POST['Piso_Dom_reg'];
        $malla = $S_POST['Nomb_Malla_Dom_reg'];
        $cond = $S_POST['IDCondicion_reg'];
        $estra = $S_POST['IDEstrato_reg'];
        $predio = $S_POST['IDPredio_reg'];
        $distrito = $S_POST['IDDistrito_reg'];
        $mensaje = "";
        if (
            $this->model->insert([
                'IDDomicilio_reg' => $id,
                'Direccion_Dom_reg' => $direc,
                'Interior_Dom_reg' => $inte,
                'Piso_Dom_reg' => $piso,
                'Nomb_Malla_Dom_reg' => $malla,
                'IDCondicion_reg' => $cond,
                'IDEstrato_reg' => $estra,
                'IDPredio_reg' => $predio,
                'IDDistrito_reg' => $distrito
            ])
        ){
            $mensaje = "Nuevo domicilio creado";
        }else{
            $mensaje = "Domicilio ya existente";
        }

        $this->view->mensaje = $mensaje;
        $this->render();
    }

    function verDomicilio($param = null)
    {
        $idDomicilio = $param[0];
        $domicilio = $this->model->getById($idDomicilio);

        session_start();
        $_SESSION['id_verDomicilio'] = $domicilio->IDDomicilio;
        $this->view->domicilio = $domicilio;
        $this->view->mensaje = "";
        $this->view->render("registrarDomicilio/formDetalleDomicilio");
    }

    function actualizarDomicilio(){
        $id=$_POST['IDDomicilio_reg'];
        $direc = $S_POST['Direccion_Dom_reg'];
        $inte = $S_POST['Interior_Dom_reg'];
        $piso = $S_POST['Piso_Dom_reg'];
        $malla = $S_POST['Nomb_Malla_Dom_reg'];
        $cond = $S_POST['IDCondicion_reg'];
        $estra = $S_POST['IDEstrato_reg'];
        $predio = $S_POST['IDPredio_reg'];
        $distrito = $S_POST['IDDistrito_reg'];

        if(!empty($id) && !empty($direc) && !empty($inte) && !empty($piso) && !empty($malla) && !empty($cond) && !empty($estra) && !empty($predio) && !empty($distrito)){
            if($this->model->update(['IDDomicilio_reg' => $id, 'Direccion_Dom_reg' => $direc, 'Interior_Dom_reg' => $inte, 'Piso_Dom_reg' => $piso,
            'Nomb_Malla_Dom_reg' => $malla, 'IDCondicion_reg' => $cond, 'IDEstrato_reg' => $estra, 'IDPredio_reg' => $predio, 'IDDistrito_reg' => $distrito])){
                $domicilio = new Domicilio();
                $domicilio->IDDomicilio = $id;
                $domicilio->Direccion_Dom = $direc;
                $domicilio->Interior_Dom = $inte;
                $domicilio->Piso_Dom = $piso;
                $domicilio->Nomb_Malla_Dom = $malla;
                $domicilio->IDCondicion = $cond;
                $domicilio->IDEstrato = $estra;
                $domicilio->IDPredido = $predio;
                $domicilio->IDDistrito = $distrito;

                $redirectUrl = constant('URL') . 'registrarDomicilio';

                echo json_encode(['success' => true, 'redirect' => $redirectUrl, 'domicilio' => $domicilio, 'mensaje' => 'Domicilio Actualizado Correctamente']);
                return;
            }
        }
        echo json_encode(['success' => false, 'mensaje' => 'No se pudo actualizar el domicilio']);
    }

    
    function eliminarDomicilio($param = null)
{
    $id = $param[0]; // Cambié $dni a $id
    if ($this->model->delete($id)) {
        $this->view->mensaje = "Domicilio Eliminado Correctamente";
    } else {
        // Msg de error
        $this->view->mensaje = "No se pudo eliminar el domicilio";
    }
    $this->render();
}

}