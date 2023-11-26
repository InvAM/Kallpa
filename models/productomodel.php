<?php
class ProductoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $productos = [];
        try {
            $query = $this->db->connect()->prepare('SELECT nombre, precio, cuota, marca, categoria, imagen FROM producto');
            $query->execute();
            while ($row = $query->fetch()) {
                $producto = new Producto();
                $producto->nombre = $row['nombre'];
                $producto->precio = $row['precio'];
                $producto->cuota = $row['cuota'];
                $producto->marca = $row['marca'];
                $producto->categoria = $row['categoria'];
                $producto->imagen = $row['imagen'];
                array_push($productos, $producto);
            }
            return $productos;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function insert($data)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO producto (nombre, precio, cuota, marca, categoria, imagen) VALUES (:nombre, :precio, :cuota, :marca, :categoria, :imagen)');
            $query->execute([
                ':nombre' => $data['nombre'],
                ':precio' => $data['precio'],
                ':cuota' => $data['cuota'],
                ':marca' => $data['marca'],
                ':categoria' => $data['categoria'],
                ':imagen' => $data['imagen'],
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>