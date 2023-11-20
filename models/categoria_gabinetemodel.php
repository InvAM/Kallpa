<?php
include_once "models/categoria_gabinete.php";

class Categoria_GabineteModel extends Model{
    public function __construct(){
        parent:: __construct();
    }

    public function get(){
        $gabinetes =[];

        try{
            $query =$this->db->connect()->prepare('SELECT IDGabineteCategoria,Descripcion_Ga FROM categoria_gabinete');
            $query->execute();
            while($row= $query ->fetch()){
                $gabinete = new Categoria_Gabinete();
                $gabinete->IDGabineteCategoria =$row['IDGabineteCategoria'];
                $gabinete->Descripcion_Ga =$row['Descripcion_Ga'];
                array_push($gabinetes,$gabinete);
            }
            return $gabinetes;
        }catch(PDOException $e){
            return [];
        }
    }
}