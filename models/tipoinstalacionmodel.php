<?php
include_once "models/tipoinstalacion.php";

class TipoInstalacionModel extends Model{
    public function __construct(){
        parent:: __construct();
    }

    public function get(){
        $tipoInstalaciones =[];

        try{
        $query=$this->db->connect()->prepare('SELECT IDTipoInst,Descripcion_TI FROM tipoinstalacion');
        $query->execute();
        while($row= $query ->fetch()){
            $tipoI =new TipoInstalacion();
            $tipoI->IDTipoInst = $row['IDTipoInst'];
            $tipoI->Descripcion_TI = $row['Descripcion_TI'];
            array_push($tipoInstalaciones,$tipoI);
        }
        return $tipoInstalaciones;
        }catch(PDOException $e){
            return [];
        }
    }
}