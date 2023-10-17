<?php
class Model
{
    function __construct()
    {
        $this->db = new Database();
    }

    function query($query)
    {
        return $this->db->conexion()->query($query);
    }
    function prepare($query)
    {
        return $this->db->conexion()->prepare($query);
    }
}
?>