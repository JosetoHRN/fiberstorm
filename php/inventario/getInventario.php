<?php
    include_once '../config/database.php';
    $database = new Database();
    $conn = $database->getConnection();

    function obtenerVideojuegos(){
        $sentencia = $conn->query("SELECT * FROM inventario;");
        return $sentencia->fetchAll();
    }

    $inv = obtenerVideojuegos();
    echo json_encode($inv);
?>