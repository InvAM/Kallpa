<?php
include_once "models/empleado.php";
class EmpleadoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO empleado(DNI_Em,Nombre_Em,Apellido_Em,Celular_Em,IDCategoria) 
            VALUES (:dni,:nom,:ape,:cel,:categoria)');
            $query->execute([
                'dni' => $datos['DNI_Em_reg'],
                'nom' => $datos['Nombre_Em_reg'],
                'ape' => $datos['Apellido_Em_reg'],
                'cel' => $datos['Celular_Em_reg'],
                'categoria' => $datos['IDCategoria_reg']
            ]);
            return true;
        } catch (PDOException $e) {



            return false;
        }
    }

    public function get()
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare('SELECT DNI_Em,Nombre_Em,Apellido_Em,Celular_Em,IDCategoria FROM empleado');
            $query->execute();
            while ($row = $query->fetch()) {
                $item = new Empleado();
                $item->DNI_Em = $row['DNI_Em'];
                $item->Nombre_Em = $row['Nombre_Em'];
                $item->Apellido_Em = $row['Apellido_Em'];
                $item->Celular_Em = $row['Celular_Em'];
                $item->IDCategoria = $row['IDCategoria'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getTecnico()
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare('SELECT DNI_Em,Nombre_Em,Apellido_Em,Celular_Em,IDCategoria FROM empleado where IDCategoria=2');
            $query->execute();
            while ($row = $query->fetch()) {
                $item = new Empleado();
                $item->DNI_Em = $row['DNI_Em'];
                $item->Nombre_Em = $row['Nombre_Em'];
                $item->Apellido_Em = $row['Apellido_Em'];
                $item->Celular_Em = $row['Celular_Em'];
                $item->IDCategoria = $row['IDCategoria'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getHabilitador()
    {
        $items = [];
        try {
            $query = $this->db->connect()->prepare('SELECT DNI_Em,Nombre_Em,Apellido_Em,Celular_Em,IDCategoria FROM empleado where IDCategoria=3');
            $query->execute();
            while ($row = $query->fetch()) {
                $item = new Empleado();
                $item->DNI_Em = $row['DNI_Em'];
                $item->Nombre_Em = $row['Nombre_Em'];
                $item->Apellido_Em = $row['Apellido_Em'];
                $item->Celular_Em = $row['Celular_Em'];
                $item->IDCategoria = $row['IDCategoria'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getById($dni)
    {
        $item = new Empleado();
        $query = $this->db->connect()->prepare('SELECT DNI_Em,Nombre_Em,Apellido_Em,Celular_Em,IDCategoria FROM empleado WHERE DNI_Em = :dni');

        try {
            $query->execute(['dni' => $dni]);

            while ($row = $query->fetch()) {
                $item->DNI_Em = $row['DNI_Em'];
                $item->Nombre_Em = $row['Nombre_Em'];
                $item->Apellido_Em = $row['Apellido_Em'];
                $item->Celular_Em = $row['Celular_Em'];
                $item->IDCategoria = $row['IDCategoria'];
            }
            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update($item)
    {
        $query = $this->db->connect()->prepare('UPDATE empleado SET Nombre_Em = :nombre, Apellido_Em = :apellido,
                                                Celular_Em = :celular, IDCategoria = :categoria WHERE DNI_Em = :dni');
        try {
            $query->execute([
                'dni' => $item['DNI_Em_reg'],
                'nombre' => $item['Nombre_Em_reg'],
                'apellido' => $item['Apellido_Em_reg'],
                'celular' => $item['Celular_Em_reg'],
                'categoria' => $item['IDCategoria_reg'],
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($dni)
    {
        $query = $this->db->connect()->prepare('DELETE FROM empleado WHERE DNI_Em = :dni');
        try {
            $query->execute([
                'dni' => $dni,
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function loguearse($dni)
    {

    }
}