<?php
include_once "models/cliente.php";
class ClienteModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT TO cliente(DNI_cli,Nombre_cli,Apellido_cli,Celular_cli,FechaNacimiento_cli,IDGenero,IDNacionalidad,IDEstadoCivil)
            VALUES (:dniC,:nomC,:apeC,:cel,:fecha,:genero,:nacionalidad,:estadoC)');
            $query->execute([
                'dniC' => $datos['DNI_cli_reg'],
                'nomC' => $datos['Nombre_cli_reg'],
                'apeC' => $datos['Apellido_cli_reg'],
                'cel'  => $datos['Celular_cli_reg'],
                'fecha'=> $datos['FechaNacimiento:_cli_reg'],
                'genero'=> $datos['IDGenero_reg'],
                'nacionalidad' => $datos['IDNacionalidad_reg'],
                'estadoC' => $datos['IDEstadoCivil_reg']
            ]);
            return true;
        } catch (PDOException $e) {

            return false;
        }
    }

    public function get()
    {
        $items = [];
        try{
            $query = $this->db->connect()->prepare('SELECT DNI_cli,Nombre_cli,Apellido_cli,Celular_cli,FechaNacimiento_cli,IDGenero,IDNacionalidad,IDEstadoCivil FROM cliente');
            $query->execute();
            while($row = $query->fetch()){
                $item = new Cliente();
                $item->DNI_cli = $row['DNI_cli'];
                $item->Nombre_cli = $row['Nombre_cli'];
                $item->Apellido_cli = $row['Apellido_cli'];
                $item->Celular_cli = $row['Celular_cli'];
                $item->FechaNacimiento_cli = $row['FechaNacimiento_cli'];
                $item->IDGenero = $row['IDGenero'];
                $item->IDNacionalidad = $row['IDNacionalidad'];
                $item->IDEstadoCivil = $row['IDEstadoCivil'];
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e){
            return [];
        }

    }

    public function getById($dniC)
    {
        $item = new Cliente();
        $query = $this->db->connect()->prepare('SELECT DNI_cli,Nombre_cli,Apellido_cli,Celular_cli,FechaNacimiento_cli,IDGenero,IDNacionalidad,IDEstadoCivil FROM cliente WHERE DNI_cli = :dniC ');
        
        try{
            $query->execute(['dniC' => $dniC]);

            while($row = $query->fetch()) {
                $item->DNI_cli = $row['DNI_cli'];
                $item->Nombre_cli = $row['Nombre_cli'];
                $item->Apellido_cli = $row['Apellido_cli'];
                $item->Celular_cli = $row['Celular_cli'];
                $item->FechaNacimiento_cli = $row['FechaNacimiento_cli'];
                $item->IDGenero = $row['IDGenero'];
                $item->IDNacionalidad = $row['IDNacionalidad'];
                $item->IDEstadoCivil = $row['IDEstadoCivil'];
            }
            return $item;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function update($item)
    {
        $query = $this->db->connect()->prepare('UPDATE cliente SET Nombre_cli = :nombre, Apellido_cli = :apellido,
        Celular_cli = :celular, FechaNacimiento_cli = :fecha, IDGenero = :genero, IDNacionalidad = :nacionalidad,
        IDEstadoCivil = :estado WHERE DNI_cli = :dni');
        try{
            $query->excute([
                'dni' => $item['DNI_cli_reg'],
                'nombre' => $item['Nombre_cli_reg'],
                'apellido' => $item['Apellido_cli_reg'],
                'celular'  => $item['Celular_cli_reg'],
                'fecha'=> $item['FechaNacimiento:_cli_reg'],
                'genero'=> $item['IDGenero_reg'],
                'nacionalidad' => $item['IDNacionalidad_reg'],
                'estado' => $item['IDEstadoCivil_reg']
            ]);
            return true;
        }catch (PDOException $e){
            return false;
        }

    }

    public function delete($dniC){
        $query = $this->db->connect()->prepare('DELETE FROM cliente WHERE DNI_cli = :dniC');
        try {
            $query->execute([
                'dniC' => $dniC,
            ]) ;
        }catch (PDOException $e){
            return false;
        }
    }

}