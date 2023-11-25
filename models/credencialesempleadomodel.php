<?php
include_once "models/credencialesempleado.php";

class CredencialesEmpleadoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //esta aqui porque necesita el DNI de la sesion
    public function obtenerInicialNombre($dni)
    {
        $query = $this->db->connect()->prepare('SELECT LEFT(Nombre_Em, 1) AS Inicial FROM empleado WHERE DNI_Em = :dni');
        $query->execute(['dni' => $dni]);

        if ($query->rowCount() > 0) {
            $row = $query->fetch();
            return $row['Inicial'];
        } else {
            return null; // O maneja el caso en que no se encuentre el empleado con ese DNI
        }
    }

    //esta aqui porque necesita el DNI de la sesion
    public function getNombreEmpleado($dni)
    {
        // Consultar la base de datos para obtener el nombre del empleado
        $query = $this->db->connect()->prepare('SELECT Nombre_Em FROM empleado WHERE DNI_Em = :dni');
        $query->execute(['dni' => $dni]);

        // Verificar si se encontraron resultados
        if ($query->rowCount() > 0) {
            // Obtener el nombre del primer resultado (puedes ajustar según tu lógica)
            $row = $query->fetch();
            return $row['Nombre_Em'];
        } else {
            // No se encontraron resultados
            return "Nombre no encontrado";
        }
    }
    public function getCredencialesEmpleado($datos)
    {
        $dni = $datos['dni'];
        $nombreusuario = $datos['nombreusuario'];
        $password = $datos['password'];
        $query = $this->db->connect()->prepare('SELECT DNI_Em, nombreusuario, password FROM credencialesempleado WHERE DNI_Em = :dni AND nombreusuario = :nombreusuario AND password = :password;');
        try {
            $query->execute(['dni' => $dni, 'nombreusuario' => $nombreusuario, 'password' => $password]);

            // Verificar si se encontraron resultados
            if ($query->rowCount() > 0) {
                // Inicio de sesión exitoso
                $credenciales = new Credencialesempleado();
                while ($row = $query->fetch()) {
                    $credenciales->DNI_Em = $row['DNI_Em'];
                    $credenciales->nombreusuario = $row['nombreusuario'];
                    $credenciales->password = $row['password'];
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

}