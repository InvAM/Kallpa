<?php
include_once "models/condicionmodel.php";
include_once "models/distritomodel.php";
include_once "models/estratomodel.php";
include_once "models/tipoprediomodel.php";
include_once "models/generomodel.php";
include_once "models/nacionalidadmodel.php";
include_once "models/estadocivilmodel.php";
include_once "models/domiciliomodel.php";

class RegistrarCliente extends Controller
{

    function __construct()
    {
        parent::__construct();
        $this->loadModel('cliente');
        $this->condiciones = new CondicionModel();
        $this->distritos = new DistritoModel();
        $this->estratos = new EstratoModel();
        $this->predios = new TipopredioModel();
        $this->generos = new GeneroModel();
        $this->nacionalidades = new NacionalidadModel();
        $this->estados = new EstadocivilModel();
        $this->domicilios = new DomicilioModel();
        $this->view->mensaje = "";

    }
    function render()
    {
        $condiciones=$this->condiciones->get();
        $distritos=$this->distritos->get();
        $estratos=$this->estratos->get();
        $predios=$this->predios->get();
        $generos = $this->generos->get();
        $nacionalidades = $this-> nacionalidades->get();
        $estados = $this->estados->get();
        $this->view->condiciones = $condiciones;
        $this->view->distritos = $distritos;
        $this->view->estratos = $estratos;
        $this->view->predios = $predios;
        $this->view->generos = $generos;
        $this->view->nacionalidades = $nacionalidades;
        $this->view->estados= $estados;
        $this->view->render('registrarCliente/formRegistrarCliente');
    }
    
    function registrarCliente(){
        $datosJson = file_get_contents("php://input");
        $datos = json_decode($datosJson, true); // Convierte el JSON a un array asociativo
        
        //verificar
        $IDDomicilio = isset($datos['IDDomicilio']) ? $datos['IDDomicilio']:null;
        $Direccion_Dom = isset($datos['Direccion_Dom']) ? $datos['Direccion_Dom']:null;
        $Interior_Dom = isset($datos['Interior_Dom']) ? $datos['Interior_Dom']:null;
        $Piso_Dom = isset($datos['Piso_Dom']) ? $datos['Piso_Dom']:null;
        $Nomb_Malla_Dom = isset($datos['Nomb_Malla_Dom']) ? $datos['Nomb_Malla_Dom']:null;
        $IDCondicion = isset($datos['IDCondicion']) ? $datos['IDCondicion']:null;
        $IDEstrato = isset($datos['IDEstrato']) ? $datos['IDEstrato']:null;
        $IDPredio = isset($datos['IDPredio']) ? $datos['IDPredio']:null;
        $IDDistrito  = isset($datos['IDDistrito']) ? $datos['IDDistrito']:null;
        $Nombre_cli = isset($datos['Nombre_cli']) ? $datos['Nombre_cli']:null;
        $Apellido_cli = isset($datos['Apellido_cli']) ? $datos['Apellido_cli']:null;
        $DNI_cli = isset($datos['DNI_cli']) ? $datos['DNI_cli']:null;
        $FechaNacimiento_cli = isset($datos['FechaNacimiento_cli']) ? $datos['FechaNacimiento_cli']:null;
        $IDGenero = isset ($datos['IDGenero']) ? $datos['IDGenero']:null;
        $Celular_cli = isset ($datos['Celular_cli']) ? $datos['Celular_cli']:null;
        $IDNacionalidad = isset ($datos['IDNacionalidad']) ? $datos['IDNacionalidad']:null;
        $IDEstadoCivil = isset($datos['IDEstadoCivil']) ? $datos['IDEstadoCivil']:null;
        if($IDDomicilio !==null){
            //Registrando domicilio
            $domicilio=$this->domicilios->getConfirmar($IDDomicilio);
            $cliente=$this->model->getConfirmar($DNI_cli);

            if(!empty($domicilio)){
                $mensaje="El domicilio con ID:" .$IDDomiclio." ya está registrado";
            }else{
                if(!empty($cliente)){
                    $mensaje="El cliente con DNI: ".$DNI_cli." "."ya esta registrado";
                }else{
                    //Registrando Domilicilio
                    if($this->domicilios->insert([
                        'IDDomicilio'=>$IDDomicilio,
                        'Direccion_Dom'=>$Direccion_Dom,
                        'Interior_Dom'=>$Interior_Dom,
                        'Piso_Dom'=>$Piso_Dom,
                        'Nomb_Malla_Dom'=>$Nomb_Malla_Dom,
                        'IDCondicion'=>$IDCondicion,
                        'IDEstrato'=>$IDEstrato,
                        'IDPredio'=>$IDPredio,
                        'IDDistrito'=>$IDDistrito
                    ])){
                        //Registrando cliente
                        if($this->model->insert([
                                'DNI_cli' => $DNI_cli,
                                'Nombre_cli' => $Nombre_cli,
                                'Apellido_cli' => $Apellido_cli,
                                'Celular_cli' => $Celular_cli,
                                'FechaNacimiento_cli' => $FechaNacimiento_cli, 
                                'IDGenero' => $IDGenero,                                
                                'IDNacionalidad' =>  $IDNacionalidad,
                                'IDEstadoCivil' => $IDEstadoCivil,
                                'IDDomicilio' => $IDDomicilio
                            ])){
                                $mensaje="Se registro cliente";
                            }else{
                                $mensaje="Error";
                            }
                    }else{
                        $mensaje="El cliente no puede ser registrado, verifique los campos";
                    }
                }
            }
            echo json_encode($mensaje);
        }else{
            echo "Error: Datos incompletos";
        }
    
    }



    

    
}