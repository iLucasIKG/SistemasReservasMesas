<?php
class Conexion {
    private $host = "localhost";
    private $dbname = "reservas_mesas";
    private $user = "root";
    private $pswd = "";
    private $PDO;

    public function conectarDB() {
        try {
            $this->PDO = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pswd);
            return $this->PDO;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function desconectar() {
        $this->PDO = null;
    }

    public function autenticar($nombreUsuario, $passUsuario) {
        if(!empty($nombreUsuario) && !empty($passUsuario)){
            return true;   
        }else {
            return false;
        }
    }
}
?>
