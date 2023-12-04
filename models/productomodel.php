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

  public function insertmateriales($datos)
  {
      try {
          $query = $this->db->connect()->prepare('INSERT INTO materiales (IDMaterial, Nombre_Ma, Precio_Ma, Stock_Ma) 
              VALUES (:idmateriales, :nombre_materiales, :precio_materiales, :stock_materiales)');
          $query->execute([
              'idmateriales' => isset($datos['codigo_material']) ? $datos['codigo_material'] : '',
              'nombre_materiales' => isset($datos['nombre_material']) ? $datos['nombre_material'] : '',
              'precio_materiales' => isset($datos['precio_material']) ? $datos['precio_material'] : '',
              'stock_materiales' => isset($datos['stock_material']) ? $datos['stock_material'] : '',
          ]);
  
          return json_encode(['success' => true, 'message' => 'Inserción exitosa']);
      } catch (PDOException $e) {
          return json_encode(['success' => false, 'message' => 'Error en la inserción']);
      }
  }
}