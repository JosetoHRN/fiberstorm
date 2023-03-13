<?php
    include_once '../config/database.php';
    $database = new Database();
    $conn = $database->getConnection();


    echo isset($_FILES['imagen']['name']) ? 'si' : 'no';
    // if(isset($_POST["submit"])) {
    //     $modelo = $_POST['modelo'];
    //     $tipo = $_POST['tipo'];
    //     $ref = isset($_POST['referencia']) ? $_POST['referencia'] : '-' ;
    //     // $imagen = $_FILES['imagen']['name'];
    //     $importancia = $_POST['importancia'];
    //     $estado = isset($_POST['estado']) ? $_POST['estado'] : '-' ;
    //     $cantidad = $_POST['cantidad'];

    //     $uploads_dir = '../../assets/img/inventario/';
    //     $target_file = $uploads_dir . basename($_FILES["imagen"]["name"]);
    //     if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
    //         echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    //     } else {
    //         echo "Sorry, there was an error uploading your file.";
    //     }
    // }

    

    

	// $sql = "INSERT INTO inventario (modelo, tipo, ref, imagen, importancia, estado, cantidad) VALUES ($modelo, $tipo, $ref, $imagen, $importancia, $estado, $cantidad);";
    // $sentencia = $conn->prepare($sql);
    // $sentencia->execute();
	// $inv = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    
    // echo json_encode($inv);
?>