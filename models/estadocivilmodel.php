<?php
include_once "models/estadocivil.php";
class EstadocivilModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare('SELECT IDEstadoCivil, Descripcion_Es FROM estadocivil');
            $query->execute();
            while ($row = $query->fetch()) {
                $item = new Estadocivil();
                $item->IDEstadoCivil = $row['IDEstadoCivil'];
                $item->Descripcion_Es = $row['Descripcion_Es'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e){
            return [];
        }
    }
}