<?php

class Conexion
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "izipay_incrustado";
    private $conexion = null;

    public function __construct()
    {
        try {
            $this->conexion = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "La conexión ha fallado: " . $e->getMessage();
        }
    }

    public function connect()
    {
        return $this->conexion;
    }

    public function closeConexion()
    {
        $this->conexion = null;
        echo "Conexion cerrada";
    }
}

// $conexion = new Conexion();
// $conexion->closeConexion();
