<?php
    include_once '../config/database.php';
    $database = new Database();
    $conn = $database->getConnection();

    try {
        $id=$_GET['id'];

        $sql = "SELECT imagen FROM inventario WHERE id = $id;";
        $sentencia = $conn->prepare($sql);
        $sentencia->execute();
        $data = $sentencia->fetch(PDO::FETCH_ASSOC);
        $img_name = $data['imagen'];

        $archivo_a_borrar = "../../assets/img/inventario/$img_name";
        if (!unlink($archivo_a_borrar)) {
            echo "Error al borrar archivo";
        } else {
            echo "Archivo borrado correctamente";
        }

        // $sql = "DELETE FROM inventario WHERE id = $id;";
        // $sentencia = $conn->prepare($sql);
        // $sentencia->execute();
        // echo "Elemento eliminiado con éxito.";
    } catch (Exception $e) {
        echo 'Error: '.$e;
    }
    die();
?>