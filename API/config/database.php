<?php

// $encodedData = file_get_contents('php://input');
// $decodedData = json_decode($encodedData, true);

class Database{
    private $host = 'PMYSQL156.dns-servicio.com';
    private $user = 'fiberstorm_admin';
    private $password = "fiberstorm_db_admin_23";
    private $database = "9688064_gestion_fs"; 

    public $conn;
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->user, $this->password);
            // $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>