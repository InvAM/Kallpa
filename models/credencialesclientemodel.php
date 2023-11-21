<?php
include_once "models/credencialescliente.php";

class CredencialesClienteModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCredencialesCliente($datos)
    {
        $username = $datos['username'];
        $password = $datos['password'];

        $query = $this->db->connect()->prepare('SELECT username, password FROM credencialescliente WHERE username = :username AND password = :password;');

        try {
            $query->execute(['username' => $username, 'password' => $password]);

            // Verificar si se encontraron resultados
            if ($query->rowCount() > 0) {
                // Inicio de sesión exitoso
                $credenciales = new Credencialescliente();
                while ($row = $query->fetch()) {
                    $credenciales->username = $row['username'];
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