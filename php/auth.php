<?php
    include('db.php');
    $username = $decodedData['username'];
    $password = $decodedData['password'];
    $hash_password = hash('sha3-512',$password);

    $SQL = "SELECT * FROM usuarios WHERE username='$username';";
    $exeSQL = mysqli_query($conn, $SQL);
    $checkEmail =  mysqli_num_rows($exeSQL);

    if ($checkEmail != 0) {
        $arrayu = mysqli_fetch_array($exeSQL);
        if ($arrayu['password'] != $hash_password) {
            $Message = "Contraseña incorrecta.";
        } else {
            $Message = "Accediendo...";
        }
    } else {
        $Message = "Este usuario no existe.";
    }

    $response[] = array("Message" => $Message);
    echo json_encode($response);
?>