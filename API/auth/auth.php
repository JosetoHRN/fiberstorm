<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../Database.php';
    $database = new Database();
    $conn = $database->getConnection();

    $encodedData = file_get_contents('php://input');
    $decodedData = json_decode($encodedData, true);

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

    // Close connection
    $conn->close();
?>