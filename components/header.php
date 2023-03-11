<?php session_start();
if(isset($_SESSION['auth'])){
    $user = $_SESSION['auth'];
}else{
    header("Location: ../auth");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiberstorm gestión</title>
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <nav class="main-nav">
        <p>Bienvenido, <?php echo $user['username']; ?>.</p>
        <?php 
        if(isset($zona)) {
            echo `<div class="header_title">
                <h1>$zona</h1>
                <a href="./index.php" class="change_area">(cambiar área)</a>
            </div>`;
        }
        ?>
        <a href="../auth/logout.php" class="secondary-light">Cerrar sesión</a>
    </nav>

<!--     
</body>
</html> -->