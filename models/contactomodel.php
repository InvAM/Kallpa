<?php
include_once "models/contacto.php";

class ContactoModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function insert ($datos){
        try{
            $query = $this->db->connect()->prepare('INSERT INTO contactanos(nombre,celular,correo,mensaje,direccion) 
                VALUES (:nombre,:celular,:correo,:mensaje,:direccion)');
            $query->execute([
                'nombre'=> $datos['nombre'],
                'celular'=> $datos['celular'],
                'correo'=> $datos['correo'],
                'mensaje'=> $datos['mensaje'],
                'direccion'=> $datos['direccion'],
            ]);
            return true;
        }catch (PDOException $e) {
            return false;
        }
    }
}