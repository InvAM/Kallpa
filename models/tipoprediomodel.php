<?php
include_once "models/tipopredio.php";
class TipopredioModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare('SELECT IDPredio, Descripcion_Pre FROM tipopredio');
            $query->execute();
            while ($row = $query->fetch()) {
                $item = new Tipopredio();
                $item->IDPredio = $row['IDPredio'];
                $item->Descripcion_Pre = $row['Descripcion_Pre'];
                array_push($items, $item);
            }
            return $items;
        } catch(PDOException $e) {
            return [];
        }
    }
}