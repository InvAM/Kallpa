<?php
include_once "models/sugerencia.php";

class SugerenciaModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function insert ($datos){
        try{
            $query = $this->db->connect()->prepare('INSERT INTO sugerencia(DNI_cli,correo,comentario) 
                VALUES (:dni,:email,:comentario)');
            $query->execute([
                'dni'=> $datos['dni'],
                'email'=> $datos['email'],
                'comentario'=> $datos['comentario'],
            ]);
            return true;
        }catch (PDOException $e) {
            return false;
        }
    }
}