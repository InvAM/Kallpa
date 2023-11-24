<?php
include_once "models/nacionalidad.php";
class NacionalidadModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];
        try{
            $query = $this->db->connect()->prepare('SELECT IDNacionalidad, Descripcion_NA FROM nacionalidad');
            $query->execute();
            while($row = $query->fetch()) {
                $item = new Nacionalidad();
                $item->IDNacionalidad = $row['IDNacionalidad'];
                $item->Descripcion_NA = $row['Descripcion_NA'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e){
            return[];
        }
    }
}