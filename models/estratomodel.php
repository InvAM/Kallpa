<?php
include_once "models/estrato.php";
class EstratoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items=[];
        try{
            $query = $this->db->connect()->prepare('SELECT IDEstrato, Descripcion_Estrato FROM estrato');
            $query->execute();
            while ($row = $query->fetch()){
                $item = new Estrato();
                $item->IDEstrato = $row['IDEstrato'];
                $item->Descripcion_Estrato = $row['Descripcion_Estrato'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return[];
        }
    }
}