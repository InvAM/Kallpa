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
          $query = $this->db->connect()->prepare('SELECT p.IDProducto, p.nombre, p.precio, p.cuota,mp.IDMarcaP, mp.detalleMarcaP,cp.IDCategoriaP, cp.detalleCategoriaP, p.imagen FROM producto p 
                                                              INNER JOIN categoria_producto cp ON p.IDCategoriaP = cp.IDCategoriaP
                                                              INNER JOIN marca_producto mp ON p.IDMarcaP = mp.IDMarcaP');
          $query->execute();
          while ($row = $query->fetch()) {
              $producto = new Producto();
              $producto->IDProducto = $row['IDProducto'];
              $producto->nombre = $row['nombre'];
              $producto->precio = $row['precio'];
              $producto->cuota = $row['cuota'];
              $producto->IDMarcaP = $row['IDMarcaP'];
              $producto->detalleMarcaP = $row['detalleMarcaP'];
              $producto->IDCategoriaP =$row['IDCategoriaP'];
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
  public function actualizarProducto($datos)
  {
      $query = $this->db->connect()->prepare('UPDATE producto 
                                              SET nombre = :nombre, 
                                                  precio = :precio, 
                                                  cuota = :cuota, 
                                                  IDCategoriaP = :categoria, 
                                                  IDMarcaP = :marca,
                                                  imagen = :imagen 
                                              WHERE IDProducto = :idproducto');

      try {
        if($datos['imagen']!== null){
          $query->execute([
              'idproducto' => $datos['IDProducto'],
              'nombre' => $datos['nombre'],
              'precio' => $datos['precio'],
              'cuota' => $datos['cuota'],
              'categoria' => $datos['IDCategoriaP'],
              'marca' => $datos['IDMarcaP'],
              'imagen' => $datos['imagen'],
          ]);
          return true;
        } 
      } catch (PDOException $e) {
          return false;
      }
  }

  public function obtenerImagenProducto($IDProducto)
{
    $query = $this->db->connect()->prepare('SELECT imagen FROM producto WHERE IDProducto = :idproducto');
    $query->execute(['idproducto' => $IDProducto]);

    $row = $query->fetch();
    return $row ? $row['imagen'] : null;
}
public function delete($IDProducto)
{
    $query = $this->db->connect()->prepare('DELETE FROM producto WHERE IDProducto = :idproducto');
    try {
        $query->execute(['idproducto' => $IDProducto]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
  }

  public function getFiltrado($categorias,$marcas)
  {
    $productos = [];
    try {
      $query = $this->db->connect()->prepare(
        'SELECT p.nombre,p.precio,p.cuota,mp.detalleMarcaP, cp.detalleCategoriaP,p.imagen FROM producto p 
                                                            inner join categoria_producto cp on p.IDCategoriaP= cp.IDCategoriaP
                                                            inner join marca_producto mp on p.IDMarcaP= mp.IDMarcaP 
                                                            WHERE cp.detalleCategoriaP in (:cate1,:cate2,:cate3) OR mp.detalleMarcaP in (:marca1,:marca2,:marca3)');
      $query->execute(['cate1'=> isset($categorias[0]) ? $categorias[0] : "",
                       'cate2'=> isset($categorias[1]) ? $categorias[1] : "",
                       'cate3'=> isset($categorias[2]) ? $categorias[2] : "",
                       'marca1'=> isset($marcas[0]) ? $marcas[0] : "",
                       'marca2'=> isset($marcas[1]) ? $marcas[1] : "",
                       'marca3'=> isset($marcas[2]) ? $marcas[2] : ""]);

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

  public function getFiltradoPrecio($minPrecio,$maxPrecio)
  {
    $productos = [];
    try {
      $query = $this->db->connect()->prepare('SELECT p.nombre, p.precio, p.cuota, mp.detalleMarcaP, cp.detalleCategoriaP, p.imagen
                                              FROM producto p
                                              INNER JOIN categoria_producto cp ON p.IDCategoriaP = cp.IDCategoriaP
                                              INNER JOIN marca_producto mp ON p.IDMarcaP = mp.IDMarcaP
                                              WHERE p.precio BETWEEN :minPrecio AND :maxPrecio');
      $query->execute(['minPrecio'=> isset($minPrecio) ? $minPrecio : 0,
                       'maxPrecio'=> isset($maxPrecio) ? $maxPrecio : 10000]);

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

  public function getOrdenar($criterio)
  {
    $productos = [];
    try {
      if($criterio=="menor-mayor"){
        $query = $this->db->connect()->prepare('SELECT p.nombre, p.precio, p.cuota, mp.detalleMarcaP, cp.detalleCategoriaP, p.imagen
        FROM producto p
        INNER JOIN categoria_producto cp ON p.IDCategoriaP = cp.IDCategoriaP
        INNER JOIN marca_producto mp ON p.IDMarcaP = mp.IDMarcaP ORDER BY p.precio ASC');
      }else if($criterio=="mayor-menor"){
        $query = $this->db->connect()->prepare('SELECT p.nombre, p.precio, p.cuota, mp.detalleMarcaP, cp.detalleCategoriaP, p.imagen
        FROM producto p
        INNER JOIN categoria_producto cp ON p.IDCategoriaP = cp.IDCategoriaP
        INNER JOIN marca_producto mp ON p.IDMarcaP = mp.IDMarcaP ORDER BY p.precio DESC');
      }
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
}