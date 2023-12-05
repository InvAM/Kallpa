<?php
include_once "models/producto.php";
class ProductoModel extends Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getP()
  {
    $productos = [];
    try {
      $query = $this->db->connect()->prepare('SELECT p.nombre,p.precio,p.cuota,mp.detalleMarcaP, cp.detalleCategoriaP,p.imagen FROM producto p 
                                                            inner join categoria_producto cp on p.IDCategoriaP= cp.IDCategoriaP
                                                            inner join marca_producto mp on p.IDMarcaP= mp.IDMarcaP');
      $query->execute();
      while ($row = $query->fetch()) {
        $producto = new Producto();
        $producto->nombre = $row['nombre'];
        $producto->precio = $row['precio'];
        $producto->cuota = $row['cuota'];
        $producto->detalleMarcaP = $row['detalleMarcaP'];
        $producto->detalleCategoriaP = $row['detalleCategoriaP'];
        $producto->imagen = $row['imagen'];
        array_push($productos, $producto);
      }
      return $productos;
    } catch (PDOException $e) {
      return [];
    }
  }
  public function getProductosForTable()
  {
      $productos = [];
      try {
          $query = $this->db->connect()->prepare('SELECT p.IDProducto, p.nombre, p.precio, p.cuota, mp.detalleMarcaP, cp.detalleCategoriaP, p.imagen FROM producto p 
                                                              INNER JOIN categoria_producto cp ON p.IDCategoriaP = cp.IDCategoriaP
                                                              INNER JOIN marca_producto mp ON p.IDMarcaP = mp.IDMarcaP');
          $query->execute();
          while ($row = $query->fetch()) {
              $producto = new Producto();
              $producto->IDProducto = $row['IDProducto'];
              $producto->nombre = $row['nombre'];
              $producto->precio = $row['precio'];
              $producto->cuota = $row['cuota'];
              $producto->detalleMarcaP = $row['detalleMarcaP'];
              $producto->detalleCategoriaP = $row['detalleCategoriaP'];
              $producto->imagen = $row['imagen'];
              array_push($productos, $producto);
          }
          return $productos;
      } catch (PDOException $e) {
          return [];
      }
  }
  public function insert($datos)
  {
    try {
      $query = $this->db->connect()->prepare('INSERT INTO producto (IDProducto, nombre, precio, cuota, IDMarcaP, IDCategoriaP, imagen) VALUES (:IDProducto, :nombre, :precio, :cuota, :IDMarcaP, :IDCategoriaP, :imagen)');
      $query->execute([
        'IDProducto' => isset($datos['IDProducto']) ? $datos['IDProducto'] : '',
        'nombre' => isset($datos['nombre']) ? $datos['nombre'] : '',
        'precio' => isset($datos['precio']) ? $datos['precio'] : '',
        'cuota' => isset($datos['cuota']) ? $datos['cuota'] : '',
        'IDMarcaP' => isset($datos['IDMarcaP']) ? $datos['IDMarcaP'] : '',
        'IDCategoriaP' => isset($datos['IDCategoriaP']) ? $datos['IDCategoriaP'] : '',
        'imagen' => isset($datos['imagen']) ? $datos['imagen'] : '',
      ]);
      return true;
    } catch (PDOException $e) {
      return false;
    }
  }
 
}