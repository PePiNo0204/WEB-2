<?php   

class conexion {
    private $servername = "localhost";
    private $user = "root";
    private $password = "";  
    private $dbname = "ejemplo_web2";
    private $conexion;

    public function __construct() {
        $this->conexion = new mysqli($this->servername, $this->user, $this->password, $this->dbname);
        if ($this->conexion->connect_error) {
            die("Conexión fallida: " . $this->conexion->connect_error);
        }
    }

    public function getConexion() {
        return $this->conexion;
    }
}
