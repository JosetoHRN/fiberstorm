<?php
    include_once '../config/database.php';
    $database = new Database();
    $conn = $database->getConnection();

    if(isset($_POST['submit'])) {
        $fileName_to_insert = 'inventario_default.png';
        if($_FILES['imagen']['name'] != "" && $_FILES['imagen']['size'] > 0) {
            $uploads_dir = '../../assets/img/inventario/';
            $target_file = $uploads_dir . $_FILES["imagen"]["name"];
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                $fileName_to_insert = $_FILES["imagen"]["name"];
            }
        }
        

        $modelo = $_POST['modelo'];
        $tipo = $_POST['tipo'];
        $ref = isset($_POST['referencia']) ? $_POST['referencia'] : '-' ;
        $importancia = $_POST['importancia'];
        $estado = isset($_POST['estado']) ? $_POST['estado'] : '-' ;
        $cantidad = $_POST['cantidad'];

        $sql = "INSERT INTO inventario (modelo, tipo, ref, imagen, importancia, estado, cantidad) VALUES ($modelo, $tipo, $ref, $fileName_to_insert, $importancia, $estado, $cantidad);";
        $sentencia = $conn->prepare($sql);
        $sentencia->execute();
    
        header("Location: ../../home/inventario.php");
    }
?>