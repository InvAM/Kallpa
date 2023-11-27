<?php
include_once "models/credencialesempleado.php";

class CredencialesEmpleadoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function obtenerInicialNombre($dni)
    {
        $query = $this->db->connect()->prepare('SELECT LEFT(Nombre_Em, 1) AS Inicial FROM empleado WHERE DNI_Em = :dni');
        $query->execute(['dni' => $dni]);

        if ($query->rowCount() > 0) {
            $row = $query->fetch();
            return $row['Inicial'];
        } else {
            return null;
        }
    }

    public function getNombreEmpleado($dni)
    {

        $query = $this->db->connect()->prepare('SELECT Nombre_Em FROM empleado WHERE DNI_Em = :dni');
        $query->execute(['dni' => $dni]);

        if ($query->rowCount() > 0) {

            $row = $query->fetch();
            return $row['Nombre_Em'];
        } else {

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


            if ($query->rowCount() > 0) {
                $credenciales = new Credencialesempleado();
                while ($row = $query->fetch()) {
                    $credenciales->DNI_Em = $row['DNI_Em'];
                    $credenciales->nombreusuario = $row['nombreusuario'];
                    $credenciales->password = $row['password'];
                }
                return $credenciales;
            } else {

                return null;
            }
        } catch (PDOException $e) {

            return null;
        }
    }
    public function insert($datos)
    {
        try {
            $query = $this->db->connect()->prepare('INSERT INTO credencialesempleado (DNI_Em, nombreusuario,password) VALUES (:dni,:nombreusuario,:password)');
            $query->execute([
                'dni' => $datos['DNI_Em'],
                'nombreusuario' => $datos['nombreusuario'],
                'password' => $datos['password'],
            ]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}