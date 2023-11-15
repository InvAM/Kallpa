<?php
include_once "models/contrato.php";

class ContratoModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $contratos=[];
        try{
            $query= $this-> db-> connect()->prepare('SELECT IDContrato, Fecha_Con, NumeroRadicado_Con,PuntoInstalacion_Con,numSum,estado,IDDomicilio,DNI_cli,DNI_Em,IDGabineteCategoria, IDTipoInst from contrato');
            $query->execute();
            while ($row= $query->fetch()){
                  $contrato = new Contrato();
                  $contrato->IDContrato=$row['IDContrato'];
                  $contrato->Fecha_Con=$row['Fecha_Con'];
                  $contrato->NumeroRadicado_Con=$row['NumeroRadicado_Con'];
                  $contrato->PuntoInstalacion_Con=$row['PuntoInstalacion_Con'];
                  $contrato->numSum=$row['numSum'];
                  $contrato->estado=$row['estado'];
                  $contrato->IDDomicilio=$row['IDDomicilio'];
                  $contrato->DNI_cli=$row['DNI_cli'];
                  $contrato->DNI_Em=$row['DNI_Em'];
                  $contrato->IDGabineteCategoria=$row['IDGabineteCategoria'];
                  $contrato->IDTipoInst=$row['IDTipoInst'];
                array_push($contratos,$contrato);
            }
            echo '<script> console.log("Hola")</script>';
            return $contratos;
        }catch(PDOException $e){
            echo '<script> console.log("Salio Mal")</script>';
           
            return [];
        }
    }

    public function getAprobado(){
        $contratos=[];
        try{
            $query= $this-> db-> connect()->prepare('SELECT IDContrato, Fecha_Con, NumeroRadicado_Con,PuntoInstalacion_Con,numSum,estado,IDDomicilio,DNI_cli,DNI_Em,IDGabineteCategoria, IDTipoInst from contrato where estado="Aprobado"');
            $query->execute();
            while ($row= $query->fetch()){
                  $contrato = new Contrato();
                  $contrato->IDContrato=$row['IDContrato'];
                  $contrato->Fecha_Con=$row['Fecha_Con'];
                  $contrato->NumeroRadicado_Con=$row['NumeroRadicado_Con'];
                  $contrato->PuntoInstalacion_Con=$row['PuntoInstalacion_Con'];
                  $contrato->numSum=$row['numSum'];
                  $contrato->estado=$row['estado'];
                  $contrato->IDDomicilio=$row['IDDomicilio'];
                  $contrato->DNI_cli=$row['DNI_cli'];
                  $contrato->DNI_Em=$row['DNI_Em'];
                  $contrato->IDGabineteCategoria=$row['IDGabineteCategoria'];
                  $contrato->IDTipoInst=$row['IDTipoInst'];
                array_push($contratos,$contrato);
            }
            echo '<script> console.log("Hola")</script>';
            return $contratos;
        }catch(PDOException $e){
            echo '<script> console.log("Salio Mal")</script>';
           
            return [];
        }
    }
}