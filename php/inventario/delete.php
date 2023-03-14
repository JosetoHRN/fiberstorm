<?php
    include_once '../config/database.php';
    $database = new Database();
    $conn = $database->getConnection();

    try {
        $id=$_GET['id'];
        $sql = "DELETE FROM inventario WHERE id = $id;";
        $sentencia = $conn->prepare($sql);
        $sentencia->execute();
        echo "Elemento eliminiado con éxito.";
    } catch (Exception $e) {
        echo 'Error: '.$e;
    }
    die();
?>