<?php
include_once "models/producto.php";
class ProductoModel extends Model
{
     
       public function __construct()
       {
        parent:: __construct();
       }
       

       /*
       public function get()
       {
          $productos = [];
          try {
              $query = $this-> db-> connect()->prepare('SELECT nombre,precio,cuota,marca,categoria,imagen FROM producto');
              $query-> execute();
              while($row=$query->fetch()){
                $producto= new Producto();
                $producto->nombre =$row['nombre'];
                $producto->precio =$row['precio'];
                $producto->cuota  =$row['cuota'];
                $producto->marca  =$row['marca'];
                $producto->categoria =$row['categoria'];
                $producto->imagen= $row['imagen'];
                array_push($productos,$producto);
            }              
            return $productos;
          }catch (PDOException $e){
            return [];
          }
       }*/

       public function getP(){
           $productos=[];
           try {
            $query = $this-> db-> connect()->prepare('SELECT p.nombre,p.precio,p.cuota,mp.detalleMarcaP, cp.detalleCategoriaP,p.imagen FROM producto p 
                                                             inner join categoria_producto cp on p.IDCategoriaP= cp.IDCategoriaP
                                                             inner join marca_producto mp on p.IDMarcaP= mp.IDMarcaP');
            $query-> execute();
            while($row=$query->fetch()){
                 $producto = new Producto();
                 $producto->nombre=$row['nombre'];
                 $producto->precio =$row['precio'];
                 $producto->cuota  =$row['cuota'];
                 $producto->detalleMarcaP  =$row['detalleMarcaP'];
                 $producto->detalleCategoriaP =$row['detalleCategoriaP'];
                 $producto->imagen= $row['imagen'];
                 array_push($productos,$producto);
             }              
            return $productos;
           }catch(PDOException $e){
               return [];
           }
       }
}