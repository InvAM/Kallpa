<?php
include_once "models/categoriaempleado.php";

class Categoriaempleadomodel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare('SELECT IDCategoria, Cargo_CE from categoriaempleado');
            $query->execute();
            while ($row = $query->fetch()) {
                $item = new Categoriaempleado();
                $item->IDCategoria = $row['IDCategoria'];
                $item->Cargo_CE = $row['Cargo_CE'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }
}