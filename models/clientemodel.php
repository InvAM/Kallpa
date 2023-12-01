<?php
include_once "models/cliente.php";
class ClienteModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCredencialesCliente($datos)
    {
        $nombrecliente = $datos['nombrecliente'];
        $dnicliente = $datos['dnicliente'];

        $query = $this->db->connect()->prepare('SELECT Nombre_cli,DNI_cli FROM cliente WHERE Nombre_cli = :nombrecliente AND DNI_cli = :dnicliente');

        try {
            $query->execute(['nombrecliente' => $nombrecliente, 'dnicliente' => $dnicliente]);

            // Verificar si se encontraron resultados
            if ($query->rowCount() > 0) {
                // Inicio de sesión exitoso
                $credenciales = new Cliente();
                while ($row = $query->fetch()) {
                    $credenciales->Nombre_cli = $row['Nombre_cli'];
                    $credenciales->DNI_cli = $row['DNI_cli'];
                }
                return $credenciales;
            } else {
                // Inicio de sesión fallido
                return null;
            }
        } catch (PDOException $e) {
            // Manejar la excepción según tus necesidades
            return null;
        }
    }
    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO cliente(DNI_cli,Nombre_cli,Apellido_cli,Celular_cli,FechaNacimiento_cli,IDGenero,IDNacionalidad,IDEstadoCivil,IDDomicilio)
            VALUES (:dniC,:nomC,:apeC,:cel,:fecha,:genero,:nacionalidad,:estadoC,:id)');
            $query->execute([
                'dniC' => $datos['DNI_cli'],
                'nomC' => $datos['Nombre_cli'],
                'apeC' => $datos['Apellido_cli'],
                'cel' => $datos['Celular_cli'],
                'fecha' => $datos['FechaNacimiento_cli'],
                'genero' => $datos['IDGenero'],
                'nacionalidad' => $datos['IDNacionalidad'],
                'estadoC' => $datos['IDEstadoCivil'],
                'id' => $datos['IDDomicilio']
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
            $query = $this->db->connect()->prepare('SELECT DNI_cli,Nombre_cli,Apellido_cli,Celular_cli,FechaNacimiento_cli,IDGenero,IDNacionalidad,IDEstadoCivil FROM cliente');
            $query->execute();
            while ($row = $query->fetch()) {
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
        } catch (PDOException $e) {
            return [];
        }

    }

    public function getById($dniC)
    {
        $item = new Cliente();
        $query = $this->db->connect()->prepare('SELECT DNI_cli,Nombre_cli,Apellido_cli,Celular_cli,FechaNacimiento_cli,IDGenero,IDNacionalidad,IDEstadoCivil FROM cliente WHERE DNI_cli = :dniC ');

        try {
            $query->execute(['dniC' => $dniC]);

            while ($row = $query->fetch()) {
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

    public function getEspecial($dniC)
    {
        $item = []; // Declaras $item como un array

        $query = $this->db->connect()->prepare('SELECT cliente.DNI_cli,cliente.Nombre_cli,cliente.Apellido_cli,cliente.IDDomicilio,domicilio.Direccion_Dom FROM cliente INNER JOIN domicilio on cliente.IDDomicilio= domicilio.IDDomicilio WHERE cliente.DNI_cli = :dniC ');

        try {
            $query->execute(['dniC' => $dniC]);

            // Supongo que deseas obtener un solo cliente, por lo que no necesitas un bucle
            if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = [
                    'DNI_cli' => $row['DNI_cli'],
                    'Nombre_cli' => $row['Nombre_cli'],
                    'Apellido_cli' => $row['Apellido_cli'],
                    'IDDomicilio' => $row['IDDomicilio'],
                    'Direccion_Dom' => $row['Direccion_Dom'],
                ];
            }

            return $item;
        } catch (PDOException $e) {
            // Manejar el error, puedes imprimirlo en la consola para depuración
            echo json_encode(['error' => 'Error de base de datos']);
            return [];
        }
    }

    public function getConfirmar($dniC)
    {
        $item = []; // Declaras $item como un array

        $query = $this->db->connect()->prepare('SELECT DNI_cli,Nombre_cli,Apellido_cli FROM cliente  WHERE DNI_cli = :dniC ');

        try {
            $query->execute(['dniC' => $dniC]);

            // Supongo que deseas obtener un solo cliente, por lo que no necesitas un bucle
            if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                $item = [
                    'DNI_cli' => $row['DNI_cli'],
                    'Nombre_cli' => $row['Nombre_cli'],
                    'Apellido_cli' => $row['Apellido_cli']
                ];
            }

            return $item;
        } catch (PDOException $e) {
            // Manejar el error, puedes imprimirlo en la consola para depuración
            echo json_encode(['error' => 'Error de base de datos']);
            return [];
        }
    }


    public function update($item)
    {
        $query = $this->db->connect()->prepare('UPDATE cliente SET Nombre_cli = :nombre, Apellido_cli = :apellido,
        Celular_cli = :celular, FechaNacimiento_cli = :fecha, IDGenero = :genero, IDNacionalidad = :nacionalidad,
        IDEstadoCivil = :estado WHERE DNI_cli = :dni');
        try {
            $query->excute([
                'dni' => $item['DNI_cli_reg'],
                'nombre' => $item['Nombre_cli_reg'],
                'apellido' => $item['Apellido_cli_reg'],
                'celular' => $item['Celular_cli_reg'],
                'fecha' => $item['FechaNacimiento:_cli_reg'],
                'genero' => $item['IDGenero_reg'],
                'nacionalidad' => $item['IDNacionalidad_reg'],
                'estado' => $item['IDEstadoCivil_reg']
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }

    }

    public function delete($dniC)
    {
        $query = $this->db->connect()->prepare('DELETE FROM cliente WHERE DNI_cli = :dniC');
        try {
            $query->execute([
                'dniC' => $dniC,
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

}