<?php
include_once "models/condicion.php";
class CondicionModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare('SELECT IDCondicion, Descripcion_Co FROM condicion');
            $query->execute();
            while ($row = $query->fetch()) {
                $item = new Condicion();
                $item->IDCondicion = $row['IDCondicion'];
                $item->Descripcion_Co = $row['Descripcion_Co'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e){
            return[];
        }
    }

}