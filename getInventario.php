<?php

    function obtenerConexion(){
        $password = "fiberstorm_db_admin_23";
        $user = 'fiberstorm_admin';
        $dbName = '9688064_gestion_fs';
        $database = new PDO('mysql:host=PMYSQL156.dns-servicio.com;dbname=' . $dbName, $user, $password);
        $database->query("set names utf8;");
        $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $database;
    }

    function obtenerVideojuegos(){
        $bd = obtenerConexion();
        $sentencia = $bd->query("SELECT * FROM inventario");
        return $sentencia->fetchAll();
    }

    $inv = obtenerVideojuegos();
    echo json_encode($inv);
?>