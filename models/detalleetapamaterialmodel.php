<?php
include_once "models/detalleetapamaterial.php";

class DetalleEtapaMaterialModel extends Model 
{
    public function __construct(){
        parent:: __construct();
    }

    public function getComprobarM($id,$idE){
    $detalleetapa=[];
    try{
        $query=$this->db->connect()->prepare('SELECT IDMateriales, IDContrato FROM detalleetapamaterial where IDEtapa=:idet and IDContrato= :idcon');
        $query->execute(['idcon'=>$id,'idet'=>$idE]);
        while($row=$query->fetch()){
            $detalleetapa[]=[
                'IDContrato'=> $row['IDContrato'],
                'IDMateriales'=> $row['IDMateriales']
            ];
        }
        return $detalleetapa;
    }catch (PDOException $e){
        return [];
    }
    }
}