<?php
include_once "models/marca_producto.php";

class MarcaProductoModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO marca_producto (IDMarcaP, detalleMarcaP) VALUES (:idMarca, :detalleMarca)');
            $query->execute([
                'idMarca' => $datos['idMarca'],
                'detalleMarca' => $datos['detalleMarca'],
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function get()
    {
        $marcas = [];
        try {
            $query = $this->db->connect()->prepare('SELECT IDMarcaP,detalleMarcaP FROM marca_producto');
            $query->execute();
            while ($row = $query->fetch()) {
                $marca = new MarcaProducto();
                $marca->IDMarcaP = $row['IDMarcaP'];
                $marca->detalleMarcaP = $row['detalleMarcaP'];
                array_push($marcas, $marca);
            }
            return $marcas;
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>
