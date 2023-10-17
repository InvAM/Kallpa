<?php

class Database
{
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;
    private $port;

    public function __construct()
    {
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASSWORD');
        $this->charset = constant('CHARSET');
        $this->port = constant('PORT');

    }

    public function conexion()
    {
        $conexion = mysqli_connect(
            $this->host,
            $this->user,
            $this->password,
            $this->db,
            $this->port
        );

        if (!$conexion) {
            die("La conexión a la base de datos falló: " . mysqli_connect_error());
        }

        // Establecer el conjunto de caracteres
        mysqli_set_charset($conexion, $this->charset);


        return $conexion;
    }


}