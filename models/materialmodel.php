<?php

include_once "models/material.php";

class MaterialModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $materiales = [];
        try {
            $query = $this->db->connect()->prepare('SELECT IDMaterial,Nombre_Ma,UnidadMedida_Ma,Stock_Ma from materiales');
            $query->execute();
            while ($row = $query->fetch()) {
                $material = new Material();
                $material->IDMaterial = $row['IDMaterial'];
                $material->Nombre_Ma = $row['Nombre_Ma'];
                $material->UnidadMedida_Ma = $row['UnidadMedida_Ma'];
                $material->Stock_Ma = $row['Stock_Ma'];
                array_push($materiales, $material);
            }
            return $materiales;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO detalleetapamaterial (IDMateriales, IDContrato,IDEtapa,Cantidad_De) 
            values (:idmaterial,:idcontrato,:idetapa,:cantidad)');
            $query->execute([
                'idmaterial' => $datos['idmaterial'],
                'idcontrato' => $datos['idcontrato'],
                'idetapa' => $datos['idetapa'],
                'cantidad' => $datos['cantidad']
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function insertmateriales($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO materiales (IDMaterial, Nombre_Ma, UnidadMedida_Ma, Stock_Ma) 
                VALUES (:idmateriales, :nombre_materiales, :UnidadMedida_Ma, :stock_materiales)');
            $query->execute([
                'idmateriales' => isset($datos['IDMaterial']) ? $datos['IDMaterial'] : '',
                'nombre_materiales' => isset($datos['Nombre_Ma']) ? $datos['Nombre_Ma'] : '',
                'UnidadMedida_Ma' => isset($datos['UnidadMedida_Ma']) ? $datos['UnidadMedida_Ma'] : '',
                'stock_materiales' => isset($datos['Stock_Ma']) ? $datos['Stock_Ma'] : '',
            ]);
    
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    public function actualizarMaterial($datos)
    {
        try {
            $query = $this->db->connect()->prepare('UPDATE materiales SET Nombre_Ma = :nombre_materiales, UnidadMedida_Ma = :Unidad_Ma, Stock_Ma = :stock_materiales WHERE IDMaterial = :idmateriales');
            $query->execute([
                'idmateriales' => $datos['IDMaterial'],
                'nombre_materiales' => $datos['Nombre_Ma'],
                'Unidad_Ma' => $datos['UnidadMedida_Ma'],
                'stock_materiales' => $datos['Stock_Ma']
            ]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
    
    public function delete($idmateriales)
    {
        try {
            $query = $this->db->connect()->prepare('DELETE FROM materiales WHERE IDMaterial = :idmateriales');
            $query->execute(['idmateriales' => $idmateriales]);
    
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}