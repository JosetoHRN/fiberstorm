<?php

// $encodedData = file_get_contents('php://input');
// $decodedData = json_decode($encodedData, true);

class Database{
    private $user = 'fiberstorm_admin';
    private $password = "fiberstorm_db_admin_23";
    private $database = "9688064_gestion_fs"; 

    public $conn;
    public function getConnection(){
        $this->conn = null;
        try{
            $database = new PDO('mysql:host=PMYSQL156.dns-servicio.com;dbname=' . $database, $user, $password);
            $database->query("set names utf8;");
            $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $database;
        }catch(PDOException $exception){
            echo "Database could not be connected.";
        }
    }
}
?>