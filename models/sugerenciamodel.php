<?php
include_once "models/sugerencia.php";

class SugerenciaModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function insert ($datos){
        try{
            $query = $this->db->connect()->prepare('INSERT INTO sugerencia(nombres,apellidos,email,comentario) 
                VALUES (:nombres,:apellidos,:email,:comentario)');
            $query->execute([
                'nombres'=> $datos['nombres_s'],
                'apellidos'=> $datos['apellidos_s'],
                'email'=> $datos['email_s'],
                'comentario'=> $datos['comentario_s'],
            ]);
            return true;
        }catch (PDOException $e) {
            return false;
        }
    }
}