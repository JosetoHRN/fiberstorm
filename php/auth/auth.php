<?php
    include_once '../config/database.php';
    $database = new Database();
    $conn = $database->getConnection();

    $encodedData = file_get_contents('php://input');
    $decodedData = json_decode($encodedData, true);
    $username = $decodedData['username'];
    $password = $decodedData['password'];
    $hash_password = hash('sha3-512',$password);

    $sql = "SELECT * FROM usuarios WHERE username='$username';";
    $sententcia = $conn->prepare($sql);
    $sententcia->execute();
    $fila = $sententcia->fetch(PDO::FETCH_ASSOC);
    echo $fila;
    // echo $_POST;
    if ($fila) {
        // $arrayu = mysqli_fetch_array($exeSQL);
        if ($fila['password'] != $hash_password) {
            $Message = "Contraseña incorrecta.";
            $Data = null;
        } else {
            $Message = "Accediendo...";
            $Data = $arrayu;
        }
    } else {
        $Message = "Este usuario no existe.";
        $Data = null;
    }

    $response[] = array("Message" => $Message, "Data" => $Data);
    echo json_encode($response);
?>