<?php
include_once "models/genero.php";
class GeneroModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get()
    {
        $items =[];
        try{
            $query = $this->db->connect()->prepare('SELECT IDGenero, Descripcion_G FROM genero');
            $query->execute();
            while($row = $query->fetch()) {
                $item = new Genero();
                $item->IDGenero = $row['IDGenero'];
                $item->Descripcion_G = $row['Descripcion_G'];
                array_push($items, $item);
            }
            return $items;
        }catch (PDOException $e) {
            return[];
        }
    }
}