<?php
include_once "models/distrito.php";
class DistritoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare('SELECT IDDistrito,Nombre_Di FROM distrito');
            $query->execute();
            while ($row = $query->fetch()) {
                $item = new Distrito();
                $item->IDDistrito = $row['IDDistrito'];
                $item->Nombre_Di = $row['Nombre_Di'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return[];
        }
    }
}