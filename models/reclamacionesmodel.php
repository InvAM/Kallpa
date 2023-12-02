<?php
include_once "models/reclamaciones.php";

class ReclamacionesModel extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function insert ($datos){
        try{
            $query = $this->db->connect()->prepare(
                'INSERT INTO reclamaciones (DNI_cli,nombre,correo,domicilio,telefono,tiposervicio,montoreclamado,descripcion,tiporeclamacion,detalle,pedido)
                VALUES (:dni,:nombre,:correo,:domicilio,:telefono,:tipos,:montor,:descripcion,:tipor,:detalle,:pedido)');
            $query->execute([
                'dni' => $datos['dni_r'],
                'nombre' => $datos['nombre_r'],
                'correo' => $datos['correo_r'],
                'domicilio' => $datos['domicilio_r'],
                'telefono' => $datos['telefono_r'],
                'tipos' => $datos['tipo_servicio_r'],
                'montor' => $datos['monto_reclamado_r'],
                'descripcion' => $datos['descripcion_r'],
                'tipor' => $datos['tipo_reclamacion_r'],
                'detalle' => $datos['detalle_r'],
                'pedido' => $datos['pedido_r'],
            ]);
            return true;
        }catch (PDOException $e) {
            return false;
        }
    }
}