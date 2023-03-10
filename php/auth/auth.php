<?php
    session_start();
    include_once '../config/database.php';
    $database = new Database();
    $conn = $database->getConnection();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash_password = hash('sha3-512',$password);

    $sql = "SELECT * FROM usuarios WHERE username='$username';";
    $sentencia = $conn->prepare($sql);
    $sentencia->execute();
    $fila = $sentencia->fetch(PDO::FETCH_ASSOC);

    if ($fila) {
        if ($fila['password'] != $hash_password) {
            header("Location: ../../auth/login.php?err=true&msg=Contraseña%20incorrecta.");
            die();
        } else {
            $_SESSION['auth'] = json_encode($fila);
            header("Location: ../../home");
            die();
        }
    } else {
        header("Location: ../../login.php?err=true&msg=Este%20usuario%20no%20existe.");
        die();
    }
?>