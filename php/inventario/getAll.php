<?php
    include_once '../config/database.php';
    $database = new Database();
    $conn = $database->getConnection();

	$sql = "SELECT * FROM inventario;";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute();
	$inv = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($inv);
    die();
?>