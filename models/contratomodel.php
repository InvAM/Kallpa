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

    public function insert($datos){

        try{
            $query=$this->db->connect()->prepare('INSERT INTO contrato(IDContrato,Fecha_Con,NumeroRadicado_Con,PuntoInstalacion_Con,
            numSum,estado,IDDomicilio,DNI_cli,DNI_Em,IDGabineteCategoria,IDTipoInst) VALUES(:idcontrato,:fecha,:numR,:puntoI,:numS,:esta,
            :iddomicilio,:dnicli,:dniem,:idgabinete,:idinstalacion)');
            $query->execute([
            'idcontrato'=>$datos['IDContrato'],
            'fecha'=>$datos['Fecha_Con'],
            'numR'=>$datos['NumeroRadicado_Con'],
            'puntoI'=>$datos['PuntoInstalacion_Con'],
            'numS'=>$datos['numSum'],
            'esta'=>$datos['estado'],
            'iddomicilio'=>$datos['IDDomicilio'],
            'dnicli'=>$datos['DNI_cli'],
            'dniem'=>$datos['DNI_Em'],
            'idgabinete'=>$datos['IDGabineteCategoria'],
            'idinstalacion'=>$datos['IDTipoInst']
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }

    }
    public function getBusqueda($dniC)
    {
        $result = [];
        $query = $this->db->connect()->prepare('SELECT DNI_cli, IDContrato FROM contrato WHERE DNI_cli = :dniC');
            
            try {
                $query->execute(['dniC' => $dniC]);
                
                while ($row = $query->fetch()) {
                    $result[] = [
                        'DNI_cli' => $row['DNI_cli'],
                        'IDContrato' => $row['IDContrato']
                    ];
                }
                
                return $result;
            } catch (PDOException $e) {
                return [];
            }
    }

    public function updateEvaluar($datos)
    {
        try {
            $query = $this->db->connect()->prepare('UPDATE contrato SET estado = :estado WHERE IDContrato = :IDContrato_c ');
            $query->execute([
                'estado'=> $datos['selectedEstado'],
                'IDContrato_c'=> $datos['IDContrato'],
            ]);
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

}