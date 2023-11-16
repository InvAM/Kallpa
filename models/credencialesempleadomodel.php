<?php
include_once "models/credencialesempleado.php";

class CredencialesEmpleadoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCredencialesEmpleado($dni, $nombreusuario, $password)
    {
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