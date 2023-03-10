<?php session_start();
if(isset($_SESSION['auth'])){
    $user = $_SESSION['auth'];
}else{
    header("Location: ../auth");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiberstorm</title>
</head>
<body>
    <h1>HOME</h1>
    <?php echo $user; ?>
    <a href="../auth/logout.php">Salir</a>
</body>
</html>