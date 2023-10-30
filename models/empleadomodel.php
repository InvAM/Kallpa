<?php
class EmpleadoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO empleado(DNI_Em,Nombre_Em,Apellido_Em,Celular_Em,IDCategoria) VALUES (:dni,:nom,:ape,:cel,:categoria)');
            $query->execute(['dni' => $datos['DNI_Em_reg'], 'nom' => $datos['Nombre_Em_reg'], 'ape' => $datos['Apellido_Em_reg'], 'cel' => $datos['Celular_Em_reg'], 'categoria' => $datos['IDCategoria_reg']]);
            return true;
        } catch (PDOException $e) {
            //echo $e->getMessage();

            echo "Ya existe ese dni registrado";
            return false;
        }
    }
}