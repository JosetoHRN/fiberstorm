<?php
    include_once '../config/database.php';
    $database = new Database();
    $conn = $database->getConnection();

    try {
        $id = $_POST['id'];
        $modelo = $_POST['modelo'];
        $tipo = $_POST['tipo'];
        $ref = $_POST['ref'];
        $importancia = $_POST['importancia'];
        $estado = $_POST['estado'];
        $cantidad = (int) $_POST['cantidad'];

        $sql = "SELECT imagen FROM inventario WHERE id = $id;";
        $sentencia = $conn->prepare($sql);
        $sentencia->execute();
        $data = $sentencia->fetch(PDO::FETCH_ASSOC);
        $img_name = $data['imagen'];

        $fileName_to_insert = $img_name;
        if($_FILES['imagen']['name'] != "" && $_FILES['imagen']['size'] > 0) {
            $archivo_a_borrar = "../../assets/img/inventario/$fileName_to_insert";
            unlink($archivo_a_borrar);
            $uploads_dir = '../../assets/img/inventario/';
            $target_file = $uploads_dir . $_FILES["imagen"]["name"];
            if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
                $fileName_to_insert = $_FILES["imagen"]["name"];
            }
        }

        $sql = "UPDATE inventario SET modelo='$modelo', tipo='$tipo', ref='$ref', importancia='$importancia', imagen='$fileName_to_insert', estado='$estado', cantidad=$cantidad WHERE id=$id;";
        $sentencia = $conn->prepare($sql);
        $sentencia->execute();

        header("Location: ../../home/inventario.php");
    } catch (Exception $e) {
        echo 'Error: '.$e;
    }
    die();
?>