<?php
include_once "models/categoriaempleado.php";

class CategoriaEmpleadoModel extends Model{
    public function __construct(){
        parent:: __construct();
    }

    public function get(){
        $categorias=[];

        try{
            $query = $this->db->connect()->prepare('SELECT IDCategoria,Cargo_CE FROM categoriaempleado');
            $query->execute();
            while($row=$query->fetch()){
                $categoria= new CategoriaEmpleado;
                $categoria->IDCategoria =$row['IDCategoria'];
                $categoria->Cargo_CE=$row['Cargo_CE'];
                array_push($categorias,$categoria);
            }
            return $categorias;
        }catch(PDOException $e){
            return[];
        }
    }
}