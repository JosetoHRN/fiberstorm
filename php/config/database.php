<?php

class Database{
    public function getConnection(){
        try{
            $database = new PDO('mysql:host=PMYSQL156.dns-servicio.com;dbname=9688064_gestion_fs', 'fiberstorm_admin', 'fiberstorm_db_admin_23');
            $database->query("set names utf8;");
            $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $database;
        }catch(PDOException $exception){
            echo "Database could not be connected";
        }
    }
}
?>