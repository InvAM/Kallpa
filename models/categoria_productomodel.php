<?php
include_once "models/categoria_producto.php";

class CategoriaProductoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO categoria_producto (IDCategoria, detalleCategoriaP) VALUES (:idCategoria:, detalleCategoria)');
            $query->execute([
                'idCategoria' => $datos['idCategoria'],
                'detalleCategoria' => $datos['detalleCategoria'],
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function get()
    {
        $categorias = [];
        try {
            $query = $this->db->connect()->prepare('SELECT IDCategoriaP,detalleCategoriaP FROM categoria_producto');
            $query->execute();
            while ($row = $query->fetch()) {
                $categoria = new CategoriaProducto();
                $categoria->IDCategoriaP = $row['IDCategoriaP'];
                $categoria->detalleCategoriaP = $row['detalleCategoriaP'];
                array_push($categorias, $categoria);
            }
            return $categorias;
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>
