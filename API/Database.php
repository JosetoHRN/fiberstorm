<?php

// $encodedData = file_get_contents('php://input');
// $decodedData = json_decode($encodedData, true);

class Database{
    private $host = 'PMYSQL156.dns-servicio.com';
    private $user = 'fiberstorm_admin';
    private $password = "fiberstorm_db_admin_23";
    private $database = "9688064_gestion_fs"; 

    public function getConnection(){ 
        $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if($conn->connect_error){
            die("Error failed to connect to MySQL: " . $conn->connect_error);
        } else {
            return $conn;
        }
    }
}
?>