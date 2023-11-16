<?php

include_once "models/material.php";

class MaterialModel extends Model{

    public function __construct(){
        parent:: __construct();
    }

    public function get(){
        $materiales=[];
        try{
           $query= $this-> db->connect() -> prepare('SELECT IDMaterial,Nombre_Ma,UnidadMedida_Ma,Stock_Ma from Materiales');
           $query->execute();
           while($row = $query->fetch()){
                $material = new Material();
                $material->IDMaterial=$row['IDMaterial'];
                $material->Nombre_Ma=$row['Nombre_Ma'];
                $material->UnidadMedida_Ma=$row['UnidadMedida_Ma'];
                $material->Stock_Ma=$row['Stock_Ma'];
                array_push($materiales,$material);
           } 
           return $materiales;
        }catch(PDOException $e){
            return [];
        }
    }

    public function insert($datos){
        try{
            $query= $this->db->connect()->prepare('INSERT INTO detalleetapamaterial (IDMateriales, IDContrato,IDEtapa,Cantidad_De) 
            values (:idmaterial,:idcontrato,:idetapa,:cantidad)');
            $query->execute([
                  'idmaterial'=>$datos['idmaterial'],
                  'idcontrato'=>$datos['idcontrato'],
                  'idetapa'=>$datos['idetapa'],
                  'cantidad'=>$datos['cantidad']
            ]);
             return true;
        }catch(PDOException $e){
             return false;
        }
    }
}